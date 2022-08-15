</div>
</div>

</section>
</div>
<footer class="main-footer">
<strong>Copyright &copy;
    2014
    <a href=" http://amu.edu.et"> AMU
</a>.</strong>
All rights reserved.
<div class="float-right d-none d-sm-inline-block">
<b>Version</b>
1.0
</div>

</footer>

<aside class="control-sidebar control-sidebar-dark"></aside>


</div>

</div>
<div id="temp-modal">
</div>

<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/plugins/moment/moment.min.js"></script>
<script src="assets/plugins/daterangepicker/daterangepicker.js"></script>
<script src="assets/plugins/chart.js/Chart.min.js"></script>

<script src="assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="assets/dist/js/adminlte.js"></script>

<script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/plugins/pace-progress/pace.min.js"></script>
<script src="assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/select2/js/select2.full.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/jquery.autocomplete.min.js"></script>
<script>

$('.select2').select2()


$('.confirm-swal').submit(function (event) {
event.preventDefault();

return confirmSwal(this,"form","Are you sure??")
});
$('.confirm-swal').click(function (event) {
event.preventDefault();

return confirmSwal(this,"link","Are you sure??")
});
function confirmSwal(a,type="link",message="Are you sure??"){

Swal.fire({
title: message,

showCancelButton: true,
confirmButtonText: 'Conform',
}).then((result) => {
/* Read more about isConfirmed, isDenied below */
if (result.value && type=="link") {

window.location.href = a.href
//  Swal.fire('Saved!', '', 'success')
} else {
console.log("dfgh");
return true;
// Swal.fire('Changes are not saved', '', 'info')
//return false;

}
})
}
</script>

</body>
</html>