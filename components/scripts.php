<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/Draggable.min.js"></script>
<script src="js/script.js"></script>
<?php foreach (($pageScripts ?? []) as $pageScript): ?>
<script src="<?php echo htmlspecialchars($pageScript, ENT_QUOTES, 'UTF-8'); ?>"></script>
<?php endforeach; ?>
<?php
$devHosts = ['localhost', '127.0.0.1'];
$currentHost = $_SERVER['HTTP_HOST'] ?? ($_SERVER['SERVER_NAME'] ?? '');
$currentHost = preg_replace('/:\d+$/', '', $currentHost);

if (in_array($currentHost, $devHosts, true)):
?>
<script src="/js/dev-reload.js"></script>
<?php endif; ?>
</body>
</html>
