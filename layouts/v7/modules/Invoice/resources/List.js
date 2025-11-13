/*+***********************************************************************************
 * The contents of this file are subject to the vtiger CRM Public License Version 1.0
 * ("License"); You may not use this file except in compliance with the License
 * The Original Code is: vtiger CRM Open Source
 * The Initial Developer of the Original Code is vtiger.
 * Portions created by vtiger are Copyright (C) vtiger.
 * All Rights Reserved.
 *************************************************************************************/

Inventory_List_Js(
  "Invoice_List_Js",
  {
    triggerExportPDFFiles: function () {
      var thisInstance = Vtiger_List_Js.getInstance();

      // Get IDs as objects first, then convert
      var selectedIdsObj = thisInstance.readSelectedIds(false);
      var excludedIdsObj = thisInstance.readExcludedIds(false);

      // Convert to arrays properly
      var selectedIds = [];
      var excludedIds = [];

      // Check if selectedIdsObj is array or object
      if (Array.isArray(selectedIdsObj)) {
        selectedIds = selectedIdsObj;
      } else if (selectedIdsObj && typeof selectedIdsObj === "object") {
        selectedIds = Object.keys(selectedIdsObj);
      }

      // Check if excludedIdsObj is array or object
      if (Array.isArray(excludedIdsObj)) {
        excludedIds = excludedIdsObj;
      } else if (excludedIdsObj && typeof excludedIdsObj === "object") {
        excludedIds = Object.keys(excludedIdsObj);
      }

      if (selectedIds.length == 0 && excludedIds.length == 0) {
        var message = app.vtranslate("JS_PLEASE_SELECT_ONE_RECORD");
        app.helper.showAlertBox({ message: message });
        return;
      }

      // Show confirmation dialog
      var message = app.vtranslate("JS_EXPORT_PDF_FILES_CONFIRMATION");
      if (selectedIds.length > 0) {
        message += " (" + selectedIds.length + " records)";
      } else {
        message += " (All visible records)";
      }

      app.helper
        .showConfirmationBox({
          message: message,
        })
        .then(
          function (e) {
            // Close confirmation dialog immediately
            jQuery(".modal.fade.in").modal("hide");
            jQuery(".modal-backdrop").remove();

            if (selectedIds.length > 0) {
              selectedIds.forEach(function (recordId, index) {
                // Correct PDFMaker download link format
                var singlePdfLink =
                  window.location.origin +
                  window.location.pathname +
                  "?module=PDFMaker&action=IndexAjax&mode=getPreviewContent&source_module=Invoice&language=en_us&record=" +
                  recordId +
                  "&generate_type=attachment";
                var detailViewLink =
                  window.location.origin +
                  window.location.pathname +
                  "?module=Invoice&view=Detail&record=" +
                  recordId;
              });

              // Bulk export still uses our custom action
              var bulkPdfLink =
                window.location.origin +
                window.location.pathname +
                "?module=Invoice&action=ExportPDFFiles&selected_ids=" +
                selectedIds.join(",");
            } else {
              var allRecordsLink =
                window.location.origin +
                window.location.pathname +
                "?module=Invoice&action=ExportPDFFiles&excluded_ids=" +
                excludedIds.join(",");
            }

            // Show loading message
            var progressIndicatorElement = jQuery.progressIndicator({
              message:
                app.vtranslate("JS_EXPORTING_PDF_FILES") +
                " - Creating ZIP file...",
              position: "html",
              blockInfo: {
                enabled: true,
              },
            });

            // Prepare form data for ZIP export
            var form = jQuery('<form method="POST" action="index.php">');
            form.append(
              '<input type="hidden" name="module" value="' +
                app.getModuleName() +
                '">'
            );
            form.append(
              '<input type="hidden" name="action" value="ExportPDFFiles">'
            );
            form.append(
              '<input type="hidden" name="selected_ids" value="' +
                selectedIds.join(",") +
                '">'
            );
            form.append(
              '<input type="hidden" name="excluded_ids" value="' +
                excludedIds.join(",") +
                '">'
            );

            // Add search parameters if any
            var searchParams = thisInstance.getListSearchParams();
            if (searchParams && Object.keys(searchParams).length > 0) {
              form.append(
                '<input type="hidden" name="search_params" value=\'' +
                  JSON.stringify(searchParams) +
                  "'>"
              );
            }

            // Create iframe for ZIP download
            var iframe = jQuery('<iframe style="display:none;">');
            iframe.attr("name", "zipDownloadFrame");
            form.attr("target", "zipDownloadFrame");

            jQuery("body").append(iframe);
            jQuery("body").append(form);

            // Handle iframe load event to hide progress indicator
            iframe.on("load", function () {
              setTimeout(function () {
                progressIndicatorElement.progressIndicator({ mode: "hide" });
                form.remove();
                iframe.remove();
              }, 3000);
            });

            // Debug: Log the form data being submitted

            // Generate and log the ZIP download link
            var zipDownloadUrl =
              window.location.origin +
              window.location.pathname +
              "?module=Invoice&action=ExportPDFFiles&selected_ids=" +
              selectedIds.join(",");
            if (excludedIds.length > 0) {
              zipDownloadUrl += "&excluded_ids=" + excludedIds.join(",");
            }

            // Main console log with requested format

            // Add create_only parameter to URL for background creation
            var zipCreationUrl = zipDownloadUrl + "&create_only=false";

            // Call ZIP creation in background using AJAX
            setTimeout(function () {
              jQuery.ajax({
                url: zipCreationUrl,
                type: "GET",
                dataType: "json", // Expecting JSON response
                success: function (response, status, xhr) {
                  // Hide progress indicator
                  progressIndicatorElement.progressIndicator({ mode: "hide" });

                  if (response.success && response.zip_download_url) {
                    // Log the download link as requested

                    // Automatically download the ZIP file
                    setTimeout(function () {
                      // Use direct navigation method - most reliable for file downloads
                      window.location.href = response.zip_download_url;

                      // If create_only is false, call cleanup after download delay
                      if (response.create_only === false) {
                        setTimeout(function () {
                          // Call cleanup endpoint to remove ZIP file
                          var cleanupUrl =
                            window.location.origin +
                            window.location.pathname +
                            "?module=Invoice&action=CleanupZipFile&zip_file=" +
                            encodeURIComponent(response.zip_file_path);

                          jQuery.ajax({
                            url: cleanupUrl,
                            type: "GET",
                            success: function (cleanupResponse) {},
                            error: function (xhr, status, error) {},
                          });
                        }, 3000); // Wait 3 seconds for download to complete
                      }
                    }, 500);
                  } else {
                    // Fallback to direct navigation
                    window.location.href = zipDownloadUrl;
                  }

                  // Cleanup
                  form.remove();
                  iframe.remove();
                },
                error: function (xhr, status, error) {
                  // Hide progress indicator
                  progressIndicatorElement.progressIndicator({ mode: "hide" });

                  // Try to parse error response
                  try {
                    var errorResponse = JSON.parse(xhr.responseText);
                    if (errorResponse.error) {
                      app.helper.showAlertBox({
                        message:
                          "Error creating ZIP file: " + errorResponse.error,
                        type: "error",
                      });
                    }
                  } catch (e) {
                    // Fallback to direct navigation if JSON parsing fails
                    window.location.href = zipDownloadUrl;
                  }

                  // Cleanup
                  form.remove();
                  iframe.remove();
                },
                timeout: 60000, // 60 seconds timeout for ZIP creation
              });
            }, 500);
          },
          function (error) {
            // User clicked "No" or cancelled - close dialog
            jQuery(".modal.fade.in").modal("hide");
            jQuery(".modal-backdrop").remove();
          }
        );
    },
  },
  {
    registerEvents: function () {
      this._super();
      this.registerExportPDFFilesEvent();
    },

    registerExportPDFFilesEvent: function () {
      var thisInstance = this;

      // Make the function globally accessible
      window.Invoice_List_Js = Invoice_List_Js;

      // Register the event for mass action links
      var container = this.getListViewContainer();
      container.on("click", 'a[href*="triggerExportPDFFiles"]', function (e) {
        e.preventDefault();
        Invoice_List_Js.triggerExportPDFFiles();
      });

      // Also handle clicks on the dropdown menu
      jQuery(document).on(
        "click",
        'a[data-url*="triggerExportPDFFiles"]',
        function (e) {
          e.preventDefault();
          Invoice_List_Js.triggerExportPDFFiles();
        }
      );

      // Handle direct JavaScript calls
      jQuery(document).on(
        "click",
        'a[onclick*="triggerExportPDFFiles"]',
        function (e) {
          e.preventDefault();
          Invoice_List_Js.triggerExportPDFFiles();
        }
      );
    },
  }
);
