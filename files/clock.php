<!DOCTYPE html>
<html>
<body>
<div id="clock">Lade...</div>

<script>
function updateClock() {
    fetch('time.php')
        .then(r => r.text())
        .then(t => document.getElementById('clock').textContent = t);
}
setInterval(updateClock, 1000);
updateClock();
</script>
</body>
</html>