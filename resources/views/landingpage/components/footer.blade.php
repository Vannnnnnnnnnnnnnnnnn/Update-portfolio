<script src="{{asset('js/js.js')}}"></script>
<script>
    humburger = document.querySelector(".humburger");
        humburger.onclick = function(){
            navBar = document.querySelector(".nav-bar");
            navBar.classList.toggle("active");
        }
        
        
        </script>

<script>
    function sendMail() {
        var params = {
            name: document.getElementById("name").value,
            email: document.getElementById("email").value,
            contact: document.getElementById("phone").value,
            subject: document.getElementById("subject").value,
            message: document.getElementById("message").value,
        };

        const serviceID = "service_zkpl0y7";
        const templateID = "template_vjdxk56";

        emailjs.send(serviceID, templateID, params)
            .then(function() {
                // Show success message using SweetAlert
                swal("Success!", "Your OTP is generated. Please check your email.", "success");
            })
            .catch(function(error) {
                // Show error message using SweetAlert
                swal("Error!", "Failed to send email: " + error, "error");
            });
    }
</script>

    
   

    <script type="text/javascript"
    src="https://cdn.jsdelivr.net/npm/@emailjs/browser@4/dist/email.min.js">
</script>
<script type="text/javascript">
(function(){
emailjs.init("mmR7xGvpezfEEiC58");
})();
</script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</html>