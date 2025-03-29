
<footer class="footer">
    <div class=" container-fluid ">

        <div class="copyright" id="copyright">
            &copy; <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
            </script>, Designed by <a href="#" target="_blank">Yasemin CAYMAZ</a>
        </div>
    </div>
</footer>
</div>
</div>
<!--   Core JS Files   -->
<script src="{{asset('assets')}}/admin/js/core/jquery.min.js"></script>
<script src="{{asset('assets')}}/admin/js/core/popper.min.js"></script>
<script src="{{asset('assets')}}/admin/js/core/bootstrap.min.js"></script>
<script src="{{asset('assets')}}/admin/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="{{asset('assets')}}/admin/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="{{asset('assets')}}/admin/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="{{asset('assets')}}/admin/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="{{asset('assets')}}/admin/demo/demo.js"></script>
<script>
    $(document).ready(function() {
        // Javascript method's body can be found in assets/js/demos.js
        demo.initDashboardPageCharts();

    });
</script>
