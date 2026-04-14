function makeTimer() {
    var a = new Date("10 April 2019 9:56:00 GMT+01:00");
    a = Date.parse(a) / 1e3;
    var e = new Date,
        s = a - (e = Date.parse(e) / 1e3),
        n = Math.floor(s / 86400),
        r = Math.floor((s - 86400 * n) / 3600),
        t = Math.floor((s - 86400 * n - 3600 * r) / 60),
        o = Math.floor(s - 86400 * n - 3600 * r - 60 * t);
    r < "10" && (r = "0" + r), t < "10" && (t = "0" + t), o < "10" && (o = "0" + o), $("#days").html(n + "<br><span>Days</span>"), $("#hours").html(r + "<br><span>Hours</span>"), $("#minutes").html(t + "<br><span>Minutes</span>"), $("#seconds").html(o + "<br><span>Seconds</span>")
}
setInterval(function() {
    makeTimer()
}, 1e3);

$(".sc-roll").click(function() {
    $('html, body').animate({
        scrollTop: $("#formscrl").offset().top
    }, 500);
});

// ===== PROMO COUNTDOWN BANNER =====
(function() {
    var DURATION_MS = 2 * 60 * 60 * 1000;
    var key = 'aprendePromoEnd_v1';
    var stored = parseInt(localStorage.getItem(key) || '0');
    var endTime = (stored && stored > Date.now()) ? stored : Date.now() + DURATION_MS;
    if (!stored || stored <= Date.now()) localStorage.setItem(key, endTime);

    var bar = document.createElement('div');
    bar.id = 'promo-countdown-bar';
    bar.innerHTML = '<span style="font-size:13px;font-weight:700;letter-spacing:1.5px;text-transform:uppercase;white-space:nowrap;">&#127873; PROMO ESPECIAL PARA NUEVOS ALUMNOS</span>'
        + '<div style="display:flex;align-items:center;gap:6px;">'
        + '<div style="display:flex;align-items:center;gap:5px;"><span id="pcd-h" style="background:rgba(255,255,255,0.18);border:1px solid rgba(255,255,255,0.3);padding:3px 10px;border-radius:5px;font-size:19px;font-weight:700;min-width:38px;display:inline-block;text-align:center;">00</span><span style="font-size:12px;font-weight:600;opacity:.9;">Hrs</span></div>'
        + '<span style="font-size:18px;opacity:.5;margin:0 2px;">&#183;</span>'
        + '<div style="display:flex;align-items:center;gap:5px;"><span id="pcd-m" style="background:rgba(255,255,255,0.18);border:1px solid rgba(255,255,255,0.3);padding:3px 10px;border-radius:5px;font-size:19px;font-weight:700;min-width:38px;display:inline-block;text-align:center;">00</span><span style="font-size:12px;font-weight:600;opacity:.9;">Min</span></div>'
        + '<span style="font-size:18px;opacity:.5;margin:0 2px;">&#183;</span>'
        + '<div style="display:flex;align-items:center;gap:5px;"><span id="pcd-s" style="background:rgba(255,255,255,0.18);border:1px solid rgba(255,255,255,0.3);padding:3px 10px;border-radius:5px;font-size:19px;font-weight:700;min-width:38px;display:inline-block;text-align:center;">00</span><span style="font-size:12px;font-weight:600;opacity:.9;">Seg</span></div>'
        + '</div>'
        + '';

    var s = bar.style;
    s.cssText = 'position:fixed;top:0;left:0;width:100%;z-index:99999;'
        + 'background:linear-gradient(90deg,#4a0a99 0%,#6a0fd4 40%,#903fff 100%);'
        + 'color:#fff;text-align:center;padding:9px 20px;'
        + 'display:flex;align-items:center;justify-content:center;gap:18px;'
        + 'box-shadow:0 3px 12px rgba(0,0,0,0.35);box-sizing:border-box;';

    document.body.insertBefore(bar, document.body.firstChild);

    function pad(n) { return n < 10 ? '0' + n : '' + n; }
    function tick() {
        var diff = endTime - Date.now();
        if (diff <= 0) { endTime = Date.now() + DURATION_MS; localStorage.setItem(key, endTime); diff = DURATION_MS; }
        var h = Math.floor(diff / 3600000), m = Math.floor((diff % 3600000) / 60000), sec = Math.floor((diff % 60000) / 1000);
        var hEl = document.getElementById('pcd-h'), mEl = document.getElementById('pcd-m'), sEl = document.getElementById('pcd-s');
        if (hEl) hEl.textContent = pad(h);
        if (mEl) mEl.textContent = pad(m);
        if (sEl) sEl.textContent = pad(sec);
    }
    tick(); setInterval(tick, 1000);
    document.body.style.paddingTop = bar.offsetHeight + 'px';
})();
// ===== END PROMO COUNTDOWN BANNER =====