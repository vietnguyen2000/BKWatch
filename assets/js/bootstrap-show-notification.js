/**
 * Author and copyright: Stefan Haack (https://shaack.com)
 * Repository: https://github.com/shaack/bootstrap-show-notification
 * License: MIT, see file 'LICENSE'
 */
 ;(function ($) {
  "use strict"

  function Notification(props) {
      // see https://getbootstrap.com/docs/4.0/components/alerts/
      this.props = {
          body: "", // put here the text, shown
          type: "primary", // the appearance
          duration: 5500, // duration till auto-hide, set to `0` to disable auto-hide
          maxWidth: "520px", // the notification maxWidth
          shadow: "0 2px 6px rgba(0,0,0,0.2)", // the box-shadow
          zIndex: 100,
          margin: "1rem", // the margin (above maxWidth)
          direction: "prepend" // or "append", the stack direction
      }
      this.containerId = "bootstrap-show-notification-container"
      for (var prop in props) {
          // noinspection JSUnfilteredForInLoop
          this.props[prop] = props[prop]
      }
      var cssClass = "alert alert-" + this.props.type + " alert-dismissible fade"
      this.id = "id-" + Math.random().toString(36).substr(2)
      this.template =
          "<div class='" + cssClass + "' role='alert'>" + this.props.body +
          "   <button type='button' style=\"position:absolute;right:2rem;top:1.4rem;\" class='close'>" +
          "       <span aria-hidden='true'>&times;</span>" +
          "   </button>" +
          "</div>"
      this.$container = $("#" + this.containerId)
      if (!this.$container.length) {
          this.$container = $("<div id='" + this.containerId + "'></div>")
          $(document.body).append(this.$container)
          var css = "#" + this.containerId + " {" +
              "position: fixed;" +
              "right: " + this.props.margin + ";" +
              "top: " + this.props.margin + ";" +
              "margin-left: " + this.props.margin + ";" +
              "z-index: " + this.props.zIndex + ";" +
              "}" +
              "#" + this.containerId + " .alert {" +
              "box-shadow: " + this.props.shadow + ";" +
              "max-width: " + this.props.maxWidth + ";" +
              "float: right; clear: right;" +
              "}" +
              "@media screen and (max-width: " + this.props.maxWidth + ") {" +
              "#" + this.containerId + " {max-width: 100%; width: 100%; right: 0; top: 0;}" +
              "#" + this.containerId + " .alert {margin-bottom: 0.25rem;width: auto;float: none;}" +
              "}"
          var head = document.head || document.getElementsByTagName('head')[0]
          var style = document.createElement('style')
          head.appendChild(style)
          style.appendChild(document.createTextNode(css))
      }
      this.showNotification()
  }

  Notification.prototype.showNotification = function () {
      var $notification = $(this.template)
      $notification.find('.close')[0].onclick = () => {$notification.alert("close")}
      if (this.props.direction === "prepend") {
          this.$container.prepend($notification)
      } else {
          this.$container.append($notification)
      }

      $notification.addClass("show")
      if(this.props.duration) {
          setTimeout(function () {
              $notification.alert("close")
          }, this.props.duration)
      }
  }
  $.extend({
      showNotification: function (props) {
          return new Notification(props)
      }
  })
}(jQuery))
