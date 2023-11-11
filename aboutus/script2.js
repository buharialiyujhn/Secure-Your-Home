function submit_contactus_form() {
    const name = $("#name").val();
    const email = $("#email").val();
    const message = $("#message").val();
  
    $.post(
      "/contactus/contactus.php",
      { name: name, email: email, message: message },
      function (data) {
        if (data === "Success") {
          alert("Your message was sent successfully!");
          $("#name").val("");
          $("#email").val("");
          $("#message").val("");
          $("#main-content").load("/home/index.php");
        } else {
          alert("There was an error sending your message. Please try again.");
        }
      }
    );
  }
  