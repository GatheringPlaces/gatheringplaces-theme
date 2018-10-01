<!-- Based on https://github.com/InteractiveMechanics/omeka-starter-theme -->

  </main>
  <!--scripts-->
  <script>
    (function(){
      var collapse = document.querySelector('.collapse-section');
      var section = document.querySelector('.page-intro');
      var state = section.getAttribute('aria-hidden') === 'true' ? false : true;
      collapse.addEventListener('click', function(){
        section.classList.toggle('section-collapsed');
        section.getAttribute('aria-hidden', state);
        this.classList.toggle('collapsed');
        this.getAttribute('aria-expanded', !state);
      })
    })();
  </script>
</body>
</html>
