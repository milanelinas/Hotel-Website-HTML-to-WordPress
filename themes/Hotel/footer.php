<footer>
  <div class="row">
      <nav class="large-5 columns">
        <ul class="vertical menu large-horizontal">
          <?php dynamic_sidebar('footer_widget'); ?>
      </ul>
      </nav>
      <div class="contact-information large-3 columns">
        <ul class="no-bullet vertical">
            <?php dynamic_sidebar('footer_cinfo'); ?>
        </ul>
      </div>
      <div class="about-us large-4 columns">
        <?php dynamic_sidebar('footer_about'); ?>
      </div>
  </div>

<p class="text-center copyright">All rights Reserved Hotel</p>

</div> <!-- off canvas content -->
</div> <!-- off canvas wrapper inner -->
</div> <!-- off canvas wrapper  -->
<?php wp_footer(); ?>
</footer>
</body>
</html>
