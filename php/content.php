<h1>Responsive Images with Ajax</h1>
<img classs="js-delay-image-load small" alt="image of boat shoes" src="img/image01.jpg">
<h2>How it works</h2>
<p>NYI: <span class="nyi">After content is retrieved on the server-side (from a database or proxy source), but before content is served up to the browser, we parse the content on the server side and replace all the image tags in the content area with anchor tags that link to the image they're replacing.</span></p>
<p>We add data attributes to the anchor tag that carry additional information about the image (classes, alt text, dimensions). This way when the page loads, no image requests are actually made (this is will be done in a moment with JS) and if the user has JS disabled they are still served working links to the images. Once the page has loaded, and if JavaScript is enabled, we get all the links in the content containing our data attribute that tells us they were originally images as well as the width of their parent element. This is key as we use that width to determine how big the image we serve up in place of the link should be.</p>
<p>On the server side during the AJAX request we check the width of the parent element against set breakpoints. If the width is below a breakpoint, instead of using the full sized image, we send a smaller sized image back to the browser based predefined hash of image dimensions. The smaller images could be created dynamically or when the full sized image is initially uploaded (via some type of content-input interface).</p>
<p>In the list of images below, if you view the page source you can see full-sized (1200x900) images are used in the html. But if you inspect an image, you'll see a smaller version is actually be loaded in on the page, based on width of the list item. The image in item 1 is actually still the full sized image because list item 1 is over 768px wide, which is one of our breakpoints defined on the back end. The images in items 2 and 3 both smaller as their parents have widths that are smaller than our set breakpoints.</p>
<p>Also we are using <span class="code">&nbsp;img { height: auto; max-width: 100%; }&nbsp;</span> in our CSS to ensure the images continue to scale with their parents are the width of the page changes (making it cross-device friendly).</p>
<ol>
  <li class="js-delay-image-load"><a href="img/image01.jpg" title="responsive image 1"></a></li>
  <li class="js-delay-image-load"><a href="img/image02.jpg" title="responsive image 2"></a></li>
  <li class="js-delay-image-load"><a href="img/image03.jpg" title="responsive image 3"></a></li>
  <li class="js-delay-image-load"><a href="img/image04.jpg" title="responsive image 4"></a></li>
  <li class="js-delay-image-load"><a href="img/image05.jpg" title="responsive image 5"></a></li>
  <li class="js-delay-image-load"><a href="img/image06.jpg" title="responsive image 6"></a></li>
</ol>