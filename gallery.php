<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

</head>

<body>
    <div class="mx-auto p-2" style="text-align:center;">
        <h1>Galerry</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div>
                        <form method="post" action="gallery.php" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="imageFile" class="form-label">Load image</label>
                                <input type="file" class="form-control" name="image" id="imageFile" required>
                            </div>
                            <input type="submit" class="btn btn-success" value="Load" name="loadImage">
                        </form>
                        <?
                        if($_FILES && $_FILES["image"]["error"]=== UPLOAD_ERR_OK){
                            $filename=$_FILES["image"]["name"];
                            move_uploaded_file($_FILES["image"]["tmp_name"], "images/".$filename);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    $imageDirectory = 'images/';

    $images = glob($imageDirectory . '*.{jpg,jpeg,png,gif,JPG,JPEG,PNG,GIF}', GLOB_BRACE);
    ?>

    <div class="container">
        <div class="row">
            <div class="d-flex flex-row flex-wrap col">
                <?
                foreach ($images as $image) {
                    echo '<div class="me-3"><img src="' . $image . '" alt="' . basename($image) . '" class="img-thumbnail" width="200"></div>';
                }
                ?>
            </div>
        </div>
    </div>
</body>

</html>