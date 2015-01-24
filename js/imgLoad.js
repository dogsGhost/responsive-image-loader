(function ($) {
  var data, parent;
  var anchors = [];

  // Get all anchors that were images.
  $('[data-was-image]').each(function () {
      parent = this.parentElement;

      // Create data object that we send back to the server to rebuild img tag.
      data = {
        width: this.parentElement.offsetWidth,
        src: this.getAttribute('href'),
        alt: this.getAttribute('data-alt'),
        title: this.getAttribute('title'),
        classes: this.getAttribute('data-classes'),
        parent: parent.nodeName.toLowerCase()
      };

      // TODO: store all our data objects so only 1 request is made, getting
      // back all our img tags at once and adding them to the page then.
      anchors.push(data);

      $.ajax({
        url: 'php/build-img-tag.php',
        type: 'POST',
        data: data,
        context: parent
      }).done(function (img) {
        $(this).find('[data-was-image]').replaceWith(img);
      });
  });
})(jQuery);