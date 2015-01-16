/**
 * Ajax.send();
 *
 * Ajax handler to send messages to WordPress AJAX API
 */
(function ($, window, document, undefined) {

	window.Ajax = (function () {

		var handler, data, ajaxUrl;

		function send(_handler, _data, _ajaxUrl) {

			handler = _handler;
			data = _data;

			return $.ajax({
				type: "post",
				dataType: "json",
				url: guessAjaxEndpoint(_ajaxUrl),
				data: getData()
			});
		}

		function getData() {

			var rawData = {
				action: handler,
				nonce: getNonce()
			};

			// do not permit to overwrite the action handler
			if (data.action !== undefined) {
				delete data.action;
			}

			return $.extend(rawData, data);
		}

		function getNonce() {
			if (window.GJS.nonce !== undefined) {
				return window.GJS.nonce;
			}

			return '';
		}

		function guessAjaxEndpoint(url) {

			if (url !== undefined) {
				return url;
			}

			// WP admin
			if (window.ajaxurl !== undefined) {
				return window.ajaxurl;
			}

			// weloquent example
			if (window.GJS.ajaxurl !== undefined) {
				return window.GJS.ajaxurl;
			}
			if (window.GJS.ajaxUrl !== undefined) {
				return window.GJS.ajaxUrl;
			}

			// something were wrong
			return false;
		}

		/**
		 * Public API
		 */
		return {

			send: send

		};

	})();

	//


})(jQuery, window, document);


/**
 * page.all.js
 */
(function ($, window, document, undefined) {

	$(document).ready(function () {

		//...

	});

})(jQuery, window, document);

