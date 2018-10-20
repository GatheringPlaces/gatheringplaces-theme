<!-- Based on https://github.com/InteractiveMechanics/omeka-starter-theme -->

  </main>
  <!--scripts-->
  <script>
    (function(){
      var collapse = document.querySelector('.collapse-section-control');
      var introSection = document.querySelector('.landing-page-intro');
      var state = introSection.getAttribute('aria-hidden') === 'true' ? false : true;
      collapse.addEventListener('click', function(){
        introSection.classList.toggle('section-collapsed');
        introSection.getAttribute('aria-hidden', state);
        this.classList.toggle('collapsed');
        this.getAttribute('aria-expanded', !state);
      })
    })();
  </script>
</body>
</html>
