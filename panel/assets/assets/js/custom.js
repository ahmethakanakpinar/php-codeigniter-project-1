$(document).ready(function(){
    $(".remove-btn").click(function ()
    {
        var $data_url = $(this).data("url");
        swal({
            title: "Emin misiniz?",
            text: "Bu işlemi geri alamayacaksınız!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: "#d33",
            confirmButtonText: "Evet, Sil!",
            cancelButtonText: "Hayır"
        }).then(function(result)
        {
            if(result.value)
            {
                window.location.href = $data_url;
            }
        });
    })
    $(".isActive").change(function()
    {
        var $data = $(this).prop("checked");
        var $data_url = $(this).data("url");

        if(typeof $data !== "undefined" && typeof $data_url !== "undefined")
        {
            $.post($data_url, { data : $data}, function (response) {});
        }
    })
})