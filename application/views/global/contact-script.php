<script>
    $(document).ready(function() {
        $(".contact-form-style-07").on("submit", function(e) {
            e.preventDefault();
            var formObj = $(this);
            var resultsObj = $(".my-custom-results"); // wherever you display messages
            var pageLoader = $(".page-loader");
            $.ajax({
                type: "POST",
                url: formObj.attr("action"),
                data: formObj.serialize(),
                dataType: "json",
                beforeSend: function() {
                    // Show loader
                    pageLoader.fadeIn();
                    // Clear out old messages
                    resultsObj.html("").addClass("d-none");
                },
                success: function(response) {
                    // If response is a string, parse it
                    if (typeof response === "string") {
                        try {
                            response = JSON.parse(response);
                        } catch (e) {
                            console.error("Response is not valid JSON", e);
                            resultsObj
                                .removeClass("d-none alert-success")
                                .addClass("alert alert-danger")
                                .html("Unexpected response format. Please try again.");
                            return;
                        }
                    }
                    if (response.status === 'success') {
                        resultsObj
                            .removeClass("d-none alert-danger")
                            .addClass("alert alert-success")
                            .html(response.message);
                        formObj[0].reset();
                    } else {
                        resultsObj
                            .removeClass("d-none alert-success")
                            .addClass("alert alert-danger")
                            .html(response.message);
                    }
                },
                error: function(xhr, status, error) {
                    resultsObj.removeClass("d-none alert-success")
                        .addClass("alert-danger")
                        .html("There was an error sending your message. Please try again later.");
                },
                complete: function() {
                    // Hide loader after success or error
                    pageLoader.fadeOut();
                }
            });
        });
    });
</script>