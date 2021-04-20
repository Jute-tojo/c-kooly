$(document).ready(function(){
    //BEGIN FONCTION 
    function chargement(){
        return $.dialog({
            title:'<span class="h6">Chargement...</span>',
            typeAnimated: true,
            closeIcon: false,
            content: function(){
                return '<div class="text-center"><span class="spinner-border text-success"></span></div>';
            },
            contentLoaded: function(data, status, xhr){
                if(status=='success'){
                    this.setContentAppend(data);
                }else{
                    this.setContentAppend('<br>Erreur! veuillez actualisé la page');
                }
            }
         });
    }
    function showError(id,data){
        $.each(data, function (key, value) {
            //var input = '#addPointage input[name=' + key + '], #addPointage select[name=' + key + '], #addPointage textarea[name=' + key + ']';
            var input = [id+' input[name=' + key + ']',
                         id+' select[name=' + key + ']',
                         id+' textarea[name=' + key + ']'
                        ];
            toast(2, value);
            $.each(input, function (kei, val){
                $(val + '+div').text(value);
                $(val).addClass('is-invalid');
            });
        });
    }
    function refreshForm(id){
            var input = [id+' input',
                         id+' textarea',
                         id+' select',
                        ];
            $.each(input, function (kei, val){
                $(val + '+.invalid-feedback').empty();
                $(val).removeClass('is-invalid');
            });
    }
    function clearForm(id){
        var input = [id+' input[type="text"]',
                     id+' input[type="number"]',
                     id+' textarea',
                     id+' select',
                    ];
        $.each(input, function (kei, val){
            $(val).val('');
        });
    }
    function toast(status,message){
        toastr.options = {
            positionClass: 'toast-bottom-right',
            showDuration: 300,
            hideDuration: 1000,
            width: '500px',
        };
        if(status==1){
            toastr.success(message);
        }else if(status==0){
            toastr.error(message);
        }else{
            toastr.warning(message);
        }
    }
    //END FONCTION

    //AUTOCOMPLETE
    $('#pseudoEt').autocomplete({
        source: $('#autocomplete').text(),
        minLength: 2,
        selectFirst:true,
        minChars: 2,
        disabled: false
    });

    //AJOUT FORMULAIRE
    $('#add').on('submit',function(e){
        e.preventDefault();
        insert('#add',$(this));
    });
    
    function insert(id="#add",me){
        var jc = chargement();  
            jc.open();
        $.ajax({
            method: me.attr('method'),
            url: me.attr('action'),
            data: me.serialize(),
            dataType: "json"
        })
        .done(function(data) {
            if(data.status==1){
                clearForm(id);
                refreshForm(id);
                toast(data.status,data.message);
            }else if(data.status==0){
                toast(data.status,data.message);
            }else{
                refreshForm(id);
                showError(id,data);
            }
            jc.close();
        })
        .fail(function(data) {
            toast(0,'Une erreur s\'est produit! Contactez - ADMIN');
        });
    }
    function insertAttribut(me,method,url,data=[]){
        var jc = chargement();  
            jc.open();
        $.ajax({
            method: method,
            url: url,
            data: {data:data},
            dataType: "json"
        })
        .done(function(data) {
            if(data.status==1){
                toast(data.status,data.message);
            }else if(data.status==0){
                me.val(data.data);
                toast(data.status,data.message);
            }else{
                me.val(data.data);
                toast(0, 'Erreur d\'insertion');
            }
            jc.close();
        })
        .fail(function(data) {
            toast(0,'Une erreur s\'est produit! Contactez - ADMIN');
        });
    }
    //INSCRIPTION
    //Affichage des tarifs selon la classe
    $('.tarif').on('click',function(e){
        e.preventDefault();
        $.confirm({
           title: '<span id="titleTarif">Tarif scolaire du 3ème B</span>',
           typeAnimated: true,
           type: 'blue',
           theme: 'bootstrap',
           closeIcon: true,
           columnClass: 'col-xs-12 col-md-8 col-lg-5',
           content: function(){            
                $('#titleTarif').parent().parent().addClass('text-center');
               return $.get("/redirection/tarifs",{});
           },
           contentLoaded: function(data, status, xhr){
               if(status=='success'){
                   this.setContentAppend(data);
               }else{
                   this.setContentAppend('<br>Erreur! veuillez actualisé la page');
               }
           },
           draggable:true,
           buttons: {
                Valider: {
                    btnClass: 'btn-success btn-lg',
                    keys: ['enter', 'shift'],
                    action: function(){
                        //envoie des données BD
                        $('#matricule').prop('disabled',false);
                        insert('#addInscription',$('#addInscription'));
                        $('#matricule').prop('disabled',true);
                    }
                },
                Modifier: {
                    btnClass: 'btn-warning',
                    action: function(){
                        $('.btn-modif').addClass('btn-add');
                        $('.btn-add').removeClass('btn-modif');
                        $('.btn-add').parent().find('span').remove();
                        return false;
                    },
                }
            }
        });
    });
    //Modification insertion suppression des données d'un étudiant
    $('#pseudoEt').on('change',function(e){
        e.preventDefault();
            //PSEUDO CHANGE
            var value = $(this).val();
            var jc = chargement();
                jc.open();
            if(value){
                $.get('http://127.0.0.1:8000/etudiant/'+value,{},function(data){
                    if(data.status==1){
                        if(data.matricule==''){
                            $('input').removeClass('change');
                        }else{
                            $('input').addClass('change');
                        }
                        $.each(data.data, function (key, value){
                            if(key=='sexe' && value==0){
                                $('select[name="'+key+'"] #zero').prop('selected',true);
                            }else if(key=='sexe' && value==1){
                                $('select[name="'+key+'"] #one').prop('selected',true);
                            }else{
                                $('input[name="'+key+'"]').val(value);
                            }
                        });
                        if(data.access=='inscription'){
                            $('#btnSubmit').prop('hidden',false);
                            $('#btnDes').prop('hidden',true);
                        }else{
                            $('#btnSubmit').prop('hidden',true);
                            $('#btnDes').prop('hidden',false);
                        }
                    }else if(data.status==0){
                        clearForm('#addInscription');
                        $('#btnSubmit').prop('hidden',false);
                        $('#btnDes').prop('hidden',true);
                    }else if(data.status==2){
                        $('input').removeClass('change');
                        clearForm('#addInscription');
                        $('#pseudoEt').val(value);
                        $('#btnSubmit').prop('hidden',false);
                    }
                    jc.close();
                    toast(data.status,data.message);
                },'json');
            }else{
                clearForm('#addInscription');
                jc.close();
            }
    });

        $('#addInscription input').on('change',function(){
            if($(this).hasClass('change') && $(this).attr('id')!='pseudoEt'){
                var value = $(this).val(), name = $(this).attr('name'), me = $(this);
                $.confirm({
                    title: 'Etes-vous sûre ?',
                    content: 'Voullez-vous vraiment enregistré ?',
                    typeAnimated: true,
                    buttons: {
                        Oui: {
                            btnClass: 'btn-success',
                            action: function(){
                                $.ajaxSetup({
                                    headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"').attr('content')}
                                })
                                insertAttribut(me,'PATCH', 'http://127.0.0.1:8000/etudiant/'+$('#pseudoEt').val(), [name,value]);
                            }
                        },
                        Non: {
                            btnClass: 'btn-danger',
                        }
                    }
                });
            }
        });

        $('#desinscrire').on('click',function(e){
            e.preventDefault();
            var url = $(this).attr('href');
            $.confirm({
                title: 'Etes-vous sûre ?',
                content: 'Voullez-vous vraiment désinscrire ?',
                typeAnimated: true,
                buttons: {
                    Oui: {
                        btnClass: 'btn-success',
                        action: function(){
                            $.ajaxSetup({
                                headers:{'X-CSRF-TOKEN':$('meta[name="csrf-token"').attr('content')}
                            })
                            var jc = chargement();  
                                    jc.open();
                                $.ajax({
                                    method: 'GET',
                                    url: url,
                                    data: {data:$('#pseudoEt').val()},
                                    dataType: "json"
                                })
                                .done(function(data) {
                                    if(data.status==1){
                                        clearForm('#addInscription');
                                        toast(data.status,data.message);
                                        $('#btnSubmit').prop('hidden',false);
                                        $('#btnDes').prop('hidden',true);
                                    }else if(data.status==0){
                                        toast(data.status,data.message);
                                    }else{
                                        toast(0, 'Erreur d\'insertion');
                                    }
                                    jc.close();
                                })
                                .fail(function(data) {
                                    toast(0,'Une erreur s\'est produit! Contactez - ADMIN');
                                });
                        }
                    },
                    Non: {
                        btnClass: 'btn-danger',
                    }
                }
            });
        });
});