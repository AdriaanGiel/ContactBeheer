$(document).ready(function(){
    


    $('a.months').on('click',function(e){
        e.preventDefault();
        var $this = $(this);
        var $tab = $this.children('.kalender'),
            $all_tabs = $this.parent().siblings().children('.months').children('.kalender'),
            $all_pops = $this.parent().siblings().children('.pop-up'),
            $pop = $this.parent().children('.pop-up');


        $all_tabs.removeClass('kalender-active');
        $all_pops.removeClass('pop-up-active');
        $tab.toggleClass('kalender-active');
        $pop.toggleClass('pop-up-active');

    });

    $('a.pop-up-close').on('click',function(e){
        e.preventDefault();
        var $this = $(this);
        var $parent = $this.closest('div.pop-up');
        $parent.toggleClass('pop-up-active');
        $parent.parent().children('.months').children('.kalender').removeClass('kalender-active');
    });



    $('#filter').on('change',function(e){
        var id = $(this).val();
        $.get('contact/filter/' + id,function(data){
            var count = 0;
            var Cid,name,lastName,birth,opmerking,pic;
            $('.contact-panel-body').empty();
            if(data.length){
                var html = '';
                $.each(data, function (key, val) {
                    if(count == 0){
                        Cid = val.id;
                        name = val.voornaam;
                        lastName = val.achternaam;
                        birth = val.geboortedatum;
                        opmerking = val.opmerking;
                        pic = val.afbeelding;
                    }


                    html = '<a href="" class="list-group-item">'+
                        '<div class="media">'+
                        '<div class="media-left contact-image-div">'+
                        '<img class="media-object small-image img-circle img-responsive" src="upload/'+ val.afbeelding +'" alt="...">'+
                        '</div>'+
                        '<div class="media-body">'+
                        '<h4 class="media-heading">'+ val.voornaam+ ' ' +val.achternaam+'</h4>'+
                        '<p>'+ val.opmerking +'</p>'+
                        '</div>'+
                        '</div>'+
                        '</a>';
                    count++;
                    $('.contact-panel-body').append(html);
                });

                $('#first_image').attr('src','upload/'+ pic);
                $('#image_link').attr('href','contact/'+Cid);
                $('.vname').empty().append(name +' '+ lastName);
                $('.birth').empty().append(birth);
                $('.comment_op').empty().append(opmerking);
            }else{
                html = '<div class="col-md-12" style="text-align: center; font-size: 25px">'+
                    '<span>( GEEN CONTACTEN IN DEZE GROEP )</span>'+
                    '</div>';

                $('.contact-panel-body').append(html);

            }

        })
    });

    if($('#kalender').length){
        $.fn.bootstrapSwitch.defaults.size = 'small';
        $.fn.bootstrapSwitch.defaults.onText = 'JA';
        $.fn.bootstrapSwitch.defaults.onColor = 'success';
        $.fn.bootstrapSwitch.defaults.offText = 'NEE';
        $.fn.bootstrapSwitch.defaults.offColor = 'info';

        $('#kalender').bootstrapSwitch();
    }


    $(function()
    {
        $('.scroll-pane').jScrollPane();
    });


    $('.delete-modal').on('click',function(e){
        var type = $(this).attr('data-type');
        var id = $(this).attr('data-id');
        var item_naam = $(this).parent().find('.content-text').text();
        var modal_title;

        switch (Number(type)){
            case 1:
                modal_title = 'Email verwijderen';
                break;
            case 2:
                modal_title = 'Telefoonnummer verwijderen';
                break;
            case 3:
                modal_title = 'Banknummer verwijderen';
                break;
            case 4:
                modal_title = 'Address verwijderen';
                break;
        }

        $('#itemId').attr('value', id);
        $('.modal-title').append(modal_title);
        $('#identifier').append(item_naam);

    });
});


