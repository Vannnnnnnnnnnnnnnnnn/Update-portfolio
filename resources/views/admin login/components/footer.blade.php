<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/7.1.0/mdb.umd.min.js"
></script>

{{-- sweetalert --}}
<link href="https://cdn.jsdelivr.net/npm/sweetalert2@11" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 <!-- Include SweetAlert Script -->
 <script>
  document.addEventListener("DOMContentLoaded", function () {
      const alert = {!! json_encode(session('alert')) !!};

      if (alert) {
          const { type, message } = alert;
          Swal.fire({
              icon: type,
              title: message,
              showConfirmButton: false,
              timer: 1500
          });
      }
  });
  dd(session('alert'));

</script>
</html>