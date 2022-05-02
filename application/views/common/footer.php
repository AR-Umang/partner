<div class="footer-bar">
   <div class="container">
      <div class="row align-items-center justify-content-center">
         <div class="col-md-8">
            <ul class="footer-links">
               <li><a href="">Privacy Policy</a></li>
               <li><a href="">Terms of Condition</a></li>
            </ul>
         </div>
         <!-- .col -->
         <div class="col-md-4 mt-2 mt-sm-0">
            <div class="d-flex justify-content-between justify-content-md-end align-items-center guttar-25px pdt-0-5x pdb-0-5x footer-copyright">
               <div class="copyright-text">&copy; <? date("Y"); ?> || Powered By KAPED.</div>

            </div>
         </div>
         <!-- .col -->
      </div>
      <!-- .row -->
   </div>
   <!-- .container -->

   <!-- <div class="scroll-to-top-master-wrapper">
      <div class="scroll-to-top" title="Go to top" onclick="topFunction()">
         <span class="fas fa-angle-up scroll-to-top-icon"></span>
      </div>
   </div> -->

</div>
<!-- .footer-bar -->
<!-- JavaScript (include all script here) -->
<?php if ($url != 'Capital Application') { ?>
   <script src="<?php echo base_url(); ?>assets/js/jquery.bundle49f7.js?ver=104"></script>
   <script src="<?php echo base_url(); ?>assets/js/script49f7.js?ver=104"></script>
<?php } ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<? echo base_url(); ?>assets/plugins/node-waves/waves.js"></script>
<!-- Sweet Alert Plugin Js -->
<script src="<? echo base_url(); ?>assets/plugins/sweetalert/sweetalert.min.js"></script>
<script src="<? echo base_url(); ?>assets/plugins/bootstrap-notify/bootstrap-notify.js"></script>

<script>
   var baseURL = `<?php echo base_url(); ?>`;
   var PartnerID = `<?php echo $profile['partner_id'] ?>`;
</script>

<?php if ($url == 'settings') { ?>
   <script src="<? echo base_url(); ?>assets/custom/settings.js"></script>
<?php } ?>
<?php if ($url == 'report') { ?>
   <script src="<? echo base_url(); ?>assets/custom/report.js"></script>
<?php } ?>
<script src="<? echo base_url(); ?>assets/custom/main.js"></script>
<?php if($this->uri->segment(1)=="customize_credit_card"){?>
<script src="<? echo base_url(); ?>assets/custom/customizeCard.js"></script>
<?php }?>

</body>

</html>