https://s3-us-west-2.amazonaws.com/s.cdpn.io/16327/MorphSVGPlugin3.min.js
var tl = gsap.timeline({repeat: -1, yoyo: true});
tl.to("#banner1", {duration: 7, morphSVG: "#banner2", ease: "power1.InOut"});

