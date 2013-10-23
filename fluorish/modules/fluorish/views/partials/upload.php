<!-- START Global Account Section -->
<style>
#wrap {
    width: 800px;
    margin: 0 auto;
}

#fileDrop {
    width: 360px;
    height: 300px;
    border: dashed 2px #ccc;
    background-color: #fefefe;
    float: left;
    color: #ccc;
}

    #fileDrop p {
        text-align: center;
        padding: 125px 0 0 0;
        font-size: 1.6em;
    }

#files {
    margin: 0 0 0 400px;
    width: 356px;
    padding: 20px 20px 40px 20px;
    border: solid 2px #ccc;
    background: #fefefe;
    min-height: 240px;
    position: relative;
}

#fileDrop,
#files {
    -moz-box-shadow: 0 0 20px #ccc;
}

#fileList {
    list-style: none;
    padding: 0;
    margin: 0;
}

    #fileList li {
        margin: 0;
        padding: 10px 0;
        margin: 0;
        overflow: auto;
        border-bottom: solid 1px #ccc;
        position: relative;
    }

        #fileList li img {
            width: 120px;
            border: solid 1px #999;
            padding: 6px;
            margin: 0 10px 0 0;
            background-color: #eee;
            display: block;
            float: left;
        }

#reset {
    position: absolute;
    top: 10px;
    right: 10px;
    color: #ccc;
    text-decoration: none;
}

#reset:hover {
    color: #333;
}

#upload {
    color: #fff;
    position: absolute;
    display: block;
    bottom: 10px;
    right: 10px;
    width: auto;
    background-color: #777;
    padding: 4px 6px;
    text-decoration: none;
    font-weight: bold;
    -moz-border-radius: 6px;
}

#upload:hover {
    background-color: #333;
}

.loader {
    position: absolute;
    bottom: 10px;
    right: 0;
    color: orange;
}

.loadingIndicator {
    width: 0%;
    height: 2px;
    background-color: orange;
    position: absolute;
    bottom: 0;
    left: 0;
}

.imagePreview {
    width: 300px;
    padding: 10px;
    border: solid 1px #ccc;
    position: absolute;
    background-color: white;
}

    .imagePreview img {
        max-width: 100%;
        display: block;
        margin: 0 auto;
    }
</style>
<div class="separator bottom"></div>
<div id="wrap">
  <h1>Choose (multiple) files or drag them onto drop zone below</h1>
  <form action="" method="post" enctype="multipart/form-data">
    <input type="file" id="fileField" name="fileField" multiple />
  </form>
  <div id="fileDrop">
    <p>Drop files here</p>
  </div>
  <div id="files">
    <h2>File list</h2>
    <a id="reset" href="#" title="Remove all files from list">Clear list</a>
    <ul id="fileList">
    </ul>
    <a id="upload" href="#" title="Upload all files in list">Upload files</a> </div>
</div>
<div class="row center">
<a href="uploads/" class="btn">View Uploads</a>
</div>
<div class="separator bottom"></div>
<script type="text/javascript" src="<?php echo getURL(); ?>file/js/file.js"></script> 
