<!DOCTYPE html>
<html>
<head>
    <title>Shellinabox Viewer</title>
</head>
<body>
    <div class="shellinabox-container">
        <iframe src="{{ route('shellinabox', ['container_id' => $container->id]) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
    </div>
</body>
</html>
