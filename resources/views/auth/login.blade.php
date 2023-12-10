<!DOCTYPE html>
<html lang="en">

<head>
	<title>ระบบจัดการบัตรประจำตัวเข้ารับพระราชทานปริญญาบัตร</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="https://colorlib.com/etc/lf/Login_v16/images/icons/favicon.ico" />

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/bootstrap/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/fonts/font-awesome-4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/css-hamburgers/hamburgers.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/animsition/css/animsition.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/select2/select2.min.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/vendor/daterangepicker/daterangepicker.css">

	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/css/util.css">
	<link rel="stylesheet" type="text/css" href="https://colorlib.com/etc/lf/Login_v16/css/main.css">

	<meta name="robots" content="noindex, follow">
	<script nonce="287b86fe-6e7d-49fe-b0d0-f2fe7f9a1dc0">
		(function(w, d) {
			! function(j, k, l, m) {
				j[l] = j[l] || {};
				j[l].executed = [];
				j.zaraz = {
					deferred: [],
					listeners: []
				};
				j.zaraz.q = [];
				j.zaraz._f = function(n) {
					return async function() {
						var o = Array.prototype.slice.call(arguments);
						j.zaraz.q.push({
							m: n,
							a: o
						})
					}
				};
				for (const p of ["track", "set", "debug"]) j.zaraz[p] = j.zaraz._f(p);
				j.zaraz.init = () => {
					var q = k.getElementsByTagName(m)[0],
						r = k.createElement(m),
						s = k.getElementsByTagName("title")[0];
					s && (j[l].t = k.getElementsByTagName("title")[0].text);
					j[l].x = Math.random();
					j[l].w = j.screen.width;
					j[l].h = j.screen.height;
					j[l].j = j.innerHeight;
					j[l].e = j.innerWidth;
					j[l].l = j.location.href;
					j[l].r = k.referrer;
					j[l].k = j.screen.colorDepth;
					j[l].n = k.characterSet;
					j[l].o = (new Date).getTimezoneOffset();
					if (j.dataLayer)
						for (const w of Object.entries(Object.entries(dataLayer).reduce(((x, y) => ({
								...x[1],
								...y[1]
							})), {}))) zaraz.set(w[0], w[1], {
							scope: "page"
						});
					j[l].q = [];
					for (; j.zaraz.q.length;) {
						const z = j.zaraz.q.shift();
						j[l].q.push(z)
					}
					r.defer = !0;
					for (const A of [localStorage, sessionStorage]) Object.keys(A || {}).filter((C => C.startsWith("_zaraz_"))).forEach((B => {
						try {
							j[l]["z_" + B.slice(7)] = JSON.parse(A.getItem(B))
						} catch {
							j[l]["z_" + B.slice(7)] = A.getItem(B)
						}
					}));
					r.referrerPolicy = "origin";
					r.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(j[l])));
					q.parentNode.insertBefore(r, q)
				};
				["complete", "interactive"].includes(k.readyState) ? zaraz.init() : j.addEventListener("DOMContentLoaded", zaraz.init)
			}(w, d, "zarazData", "script");
		})(window, document);
	</script>
	<style>
		.login100-form-btn {
			font-family: Ubuntu-Bold;
			font-size: 18px;
			color: #fff;
			line-height: 1.2;
			text-transform: uppercase;
			display: -webkit-box;
			display: -webkit-flex;
			display: -moz-box;
			display: -ms-flexbox;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 0 20px;
			min-width: 160px;
			height: 42px;
			border-radius: 21px;
			background: #d41872;
			background: -webkit-linear-gradient(left, #b29245, #d4c918, #fab942);
			background: -o-linear-gradient(left, #a445b2, #d41872, #fa4299);
			background: -moz-linear-gradient(left, #a445b2, #d41872, #fa4299);
			background: linear-gradient(left, #a445b2, #d41872, #fa4299);
			position: relative;
			z-index: 1;
			-webkit-transition: all .4s;
			-o-transition: all .4s;
			-moz-transition: all .4s;
			transition: all .4s;
		}
	</style>
</head>

<body>
	<div class="limiter">
		<div class="container-login100" style="background-image: url('https://www.sskru.ac.th/wp-content/uploads/2016/03/SSKRU-LAC.jpg');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">

				</span>
				<form class="login100-form validate-form p-b-33 p-t-5"  method="POST" action="{{ route('login') }}">
					@csrf
					<div class="fadeIn first text-center">
						<img src="/login.JPG" class="m-2" id="icon" alt="User Icon" width="50%"><br>
						<span><b>ระบบจัดการบัตรเข้ารับปริญญา</b></small>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter username">
						<input class="input100" type="text" name="email" placeholder="User name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
					</div>
					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<input class="input100" type="password"  name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
					</div>
					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div id="dropDownSelect1"></div>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/jquery/jquery-3.2.1.min.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/animsition/js/animsition.min.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/bootstrap/js/popper.js"></script>
	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/bootstrap/js/bootstrap.min.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/select2/select2.min.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/daterangepicker/moment.min.js"></script>
	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/daterangepicker/daterangepicker.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/vendor/countdowntime/countdowntime.js"></script>

	<script src="https://colorlib.com/etc/lf/Login_v16/js/main.js"></script>

	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-23581568-13');
	</script>
	<script defer src="https://static.cloudflareinsights.com/beacon.min.js/v84a3a4012de94ce1a686ba8c167c359c1696973893317" integrity="sha512-euoFGowhlaLqXsPWQ48qSkBSCFs3DPRyiwVu3FjR96cMPx+Fr+gpWRhIafcHwqwCqWS42RZhIudOvEI+Ckf6MA==" data-cf-beacon='{"rayId":"8333759028a16044","version":"2023.10.0","token":"cd0b4b3a733644fc843ef0b185f98241"}' crossorigin="anonymous"></script>
</body>

</html>