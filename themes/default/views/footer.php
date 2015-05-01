<!-- Footer -->
<footer>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; <?php echo $this->preference->item('site_name'); ?> <?php echo date('Y'); ?></p>
        </div>
    </div>
</footer>

</div>
<!-- /.container -->

<!-- jQuery -->
<script src="<?php echo theme_url(); ?>assets/js/jquery.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo theme_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- Script to Activate the Carousel -->
<script>
$(document).ready(function()
{
    $(".status_box").animate({opacity: 1.0}, 1500).fadeOut();
    $('.status_box').click(function(){
        $(this).hide();
    });
});

$('.carousel').carousel({
    interval: 5000 //changes the speed
})

</script>

<?php if($this->preference->item('activate_google_analytics')):?>
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', '<?php echo $this->preference->item('google_analytics_tracking_code')?>']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>
<?php endif?>

</body>

</html>
