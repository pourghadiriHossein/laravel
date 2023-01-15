# Create Public Side

<ol>
    <li>Create private and private-side-files folder
        <ul>
            <br><li>In public folder</li>
            <br><li>In resources/views folder</li>
        </ul>
    </li><br>
    <li>Copy and Paste to public/private-side-files
        <ul>
            <br><li>css folder</li>
            <br><li>font folder</li>
            <br><li>image folder</li>
            <br><li>js folder</li>
        </ul>
    </li><br>
    <li>Make PublicController
        <ul>
            <br><li>php artisan make:controller PrivateController</li>
        </ul>
    </li><br>
    <li>Create layout Process
        <ul>
            <br><li>Create privateLayout.blade.php file for private side layout in resources/views/private folder</li>
            <br><li>Create public function index in PrivateController</li>
            <br><li>Create get method route for index in routes/web.php</li>
        </ul>
    </li><br>
    <li>Create user Process
        <ul>
            <br><li>Create blade.php files for users process in resources/views/private folder</li>
            <br><li>Create public function users process in PrivateController</li>
            <br><li>Create get method route for users process in routes/web.php</li>
        </ul>
    </li><br>
    
</ol>
