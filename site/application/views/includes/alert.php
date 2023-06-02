<?php $alert = $this->session->userdata("alert"); ?> <!-- session dan alınan değeri $alert değişkenine atıyorum  -->
    <?php if($alert == "success"): ?>   <!-- $alert değişkeni eğer succes ise if e girer -->
        <script>    //javascript kodu yazdığım için script yazdım
            $("#MessageSent").removeClass("hidden"); //MessageSent id sine ulaşıp hidden class ını siliyor    
        </script>
    <?php elseif($alert == "error"): ?> <!-- $alert değişkeni eğer error ise elseif e girer -->
        <script>
            $("#MessageNotSent").removeClass("hidden"); //MessageNotSent id sine ulaşıp hidden class ını siliyor    
        </script>
    <?php endif; ?>                               <!-- En sonda ise session u siliyorum çünkü önceki kalan session --> 
<?php $this->session->unset_userdata("alert"); ?> <!-- sayfayı  yenileyince gitmesi için silinmezse iletişim sayfasında gözükür-->