<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>
                    document.write(new Date().getFullYear())
                </script> © Shikhi.
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Design & Develop by Pixcafe
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<!-- JAVASCRIPT -->
<script src="{{ asset('backend') }}/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/simplebar/simplebar.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/node-waves/waves.min.js"></script>
<script src="{{ asset('backend') }}/assets/libs/feather-icons/feather.min.js"></script>
<script src="{{ asset('backend') }}/assets/js/pages/plugins/lord-icon-2.1.0.js"></script>
<script src="{{ asset('backend') }}/assets/js/plugins.js"></script>


<!-- filepond js -->
 <!-- Add plugin scripts -->
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-resize/dist/filepond-plugin-image-resize.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-transform/dist/filepond-plugin-image-transform.js"></script>

    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>


<!-- App js -->
<script src="{{ asset('backend') }}/assets/js/app.js"></script>
@yield('script')
</body>

</html>
