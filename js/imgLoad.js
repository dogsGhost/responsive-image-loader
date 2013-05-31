var imgLoad = {
  init: function () {
    var data, parent, request;

    $('.js-delay-image-load').find('a').each(function () {
      parent = this.parentElement;

      data = {
        width: this.parentElement.offsetWidth,
        src: this.getAttribute('href'),
        alt: this.getAttribute('title'),
        parent: parent.nodeName.toLowerCase()
      };

      request = $.ajax({
        url: 'php/imgcheck.php',
        type: 'POST',
        data: data,
        context: parent
      });

      request.done(function (img) {
        this.innerHTML = img;
      });

    });
  }
};

imgLoad.init();