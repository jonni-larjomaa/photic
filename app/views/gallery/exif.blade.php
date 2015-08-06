<div class="image-info">
    <ul class="image-exif">
        <li>
            Name: <small>{{ array_get($exif, 'FileName', 'N/A')}}</small>
        </li>
        <li>
            W: <small>{{ array_get($exif, 'COMPUTED.Width', 'N/A')}}</small>
        </li>
        <li>
            H: <small>{{ array_get($exif, 'COMPUTED.Height', 'N/A')}}</small>
        </li>
        <li>
            Model: <small>{{ array_get($exif, 'Model', 'N/A') }}</small>
        </li>
        <li>
            Make: <small>{{ array_get($exif, 'Make', 'N/A') }}</small>
        </li>
    </ul>
</div>

