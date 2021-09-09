<section>


    <form action="/img_host/" method="POST" enctype="multipart/form-data">

        <div class="image">
            <label for="image">Image</label>
            <input type="file" name="image" id="image">
        </div>

        <button type="submit">Envoyer</button>
    
    </form>
    <div>

        <?php
        
        if(isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {

            if($_FILES["image"]["size"] <= 3000000) {

                $imgInfos = pathinfo($_FILES["image"]["name"]);
                $extensionsImage = $imgInfos["extension"];
                $extensionsArray = array("png", "gif", "jpg", "jpeg");
                $name = time().rand().rand() . "." . $extensionsImage;

                if(in_array($extensionsImage, $extensionsArray)) {

                    move_uploaded_file($_FILES["image"]["tmp_name"], "./uploads/".$name);

                    echo "<a href='/img_host/uploads/$name'>Consulter votre image</a>";
                    echo $name;
                }
            }

        }

        ?>

    </div>

</section>