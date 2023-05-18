<section class="main-container">
    <div class="container">
        <h1 class="page-title">Markalar</h1>
        <p>Markalar</p>
        <div class="separator-2"></div>
        <div class="row">
        <div class="container_new mt-5">
            <div class="bg-light my-4 py-2" style="margin-bottom: 25px;">
                <ul class="list-inline text-center m-0">
                    <li class="list-inline-item px-2"><a class="text-decoration-none" onclick="tiklanma(this); return false;" href="#" >Hepsi</a></li>
                    <?php $alfabe = range('a', 'z'); ?>
                    <?php foreach ($alfabe as $harf):?>
                        <li class="list-inline-item px-2"><a class="text-decoration-none" onclick="tiklanma(this); return false;" href="#" ><?php echo strtoupper($harf); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
            <?php foreach($brands as $brand): ?>
                <div class="col-sm-4 firma">
                    <div class="image-box shadow text-center mb-20">
                        <div class="overlay-container">
                        <img src="<?php echo !empty($brand->img_url) ? base_url("panel/uploads/{$image_folder_name}/$brand->img_url") : base_url("assets/images/portfolio-1.jpg") ?>" alt="<?php echo $brand->img_url ?>">
                            <div class="overlay-top">
                            </div>
                            <div class="overlay-bottom">
                                <div class="text">
                                        <h3><a href="portfolio-item.html" class="firmaName"><?php echo $brand->title; ?></a></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        </div>
           
    </div>
</section>
<script>
    var _firmaName = document.getElementsByClassName("firmaName");  //firmaName adında tüm class ları alıyorum
    var _firma = document.getElementsByClassName("firma");          //firma adında tüm class ları alıyorum
    var firmaSayisi = _firma.length;    //_firma kaç tane varsa sayısını alır
    function tiklanma(id) //tüm harflere onlick verdim ve hangisine tıklanırsa onun harfini id olarak alır
    {
        if(id.innerHTML.toLowerCase() != "hepsi")   //hepsi hariç bu if e girer
        {
            for (let i = 0; i < firmaSayisi; i++)   //firma sayısı kadar for döner
            {
                var firmaFirst = _firmaName[i].innerHTML.slice(0,1); //tüm firmaların ilk harfini alır firmaFirst adlı değişkene atar
                if(firmaFirst.toLowerCase() != id.innerHTML.toLowerCase()) //firmanın ilk harfi ile üstte tıklanan harf eşit değilse 
                {           //toLowerCase tüm harfleri küçültür
                    _firma[i].style.display = "none";       //none yapar
                }
                else
                {
                    _firma[i].style.display = "block";      //eşitse block yapar gösterir
                }
            }
        }
        else        //üstte tıklanan hepsi ise elseye girer
        {
            for (let i = 0; i < firmaSayisi; i++)
            {
                _firma[i].style.display = "block";  //firma sayısı kadar dönen for ve hepsini block yapar
            }
        }
    }
</script>
