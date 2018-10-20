<!-- Based on https://github.com/InteractiveMechanics/omeka-starter-theme -->

  </main>
  <!--scripts-->
  <script>
    (function(){
      var collapse = document.querySelector('.collapse-section-control');
      var sectionCollapse = document.querySelector('.section-collapsible');
      var sectionExpand = document.querySelector('.section-expandable');
      var state = sectionCollapse.getAttribute('aria-hidden') === 'true' ? false : true;
      collapse.addEventListener('click', function(){
        sectionCollapse.classList.toggle('section-collapsed');
        sectionCollapse.getAttribute('aria-hidden', state);
        sectionExpand.classList.toggle('section-expanded');
        this.classList.toggle('collapsed');
        this.getAttribute('aria-expanded', !state);
      })
    })();
  </script>
</body>
</html>
