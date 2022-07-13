<!DOCTYPE html>
<html lang="en">
    <head>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="csrf-token" content="vvdf04591obyfuawQ0FIW9kb21ntNtdPU5DbJO2F">
            <title>G-resto</title>

            <!-- Fonts -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
            <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


            <!-- Styles -->
            <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
            <!-- Favicons -->
            <link rel="stylesheet" href="{{ asset('assets/img/favicon.png')}}">
            <link rel="apple-touch-icon" href="{{ asset('assets/img/apple-touch-icon.png')}}">

            <!-- Google Fonts -->
            <link href="https://fonts.gstatic.com" rel="preconnect">
            <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

            <!-- Vendor CSS Files -->
            <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.snow.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/quill/quill.bubble.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/remixicon/remixicon.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css')}}">
            <link rel="stylesheet" href="{{ asset('assets/vendor/simple-datatables/style.css')}}">

            <!-- Template Main CSS File -->
            <link rel="stylesheet" href="{{ asset('assets/css/style.css')}}">
    </head>
    <body>

        @yield('contenu')

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <script src="{{asset('assets/vendor/jQuery/jquery-3.6.js')}}"></script>
        <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{asset('assets/vendor/chart.js/chart.min.js')}}"></script>
        <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}"></script>
        <script src="{{asset('assets/vendor/quill/quill.min.js')}}"></script>
        <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
        <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
        <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.js" charset="utf-8"></script>
        <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">

        <script src="{{asset('assets/js/jquery-1.12.4.js')}}"></script>
        <script src="{{asset('assets/js/JQuery-1.12.js')}}"></script>
        <link href="{{asset('assets/js/jqueryThemesUI.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap3-dialog/1.35.4/css/bootstrap-dialog.min.css" integrity="sha512-PvZCtvQ6xGBLWHcXnyHD67NTP+a+bNrToMsIdX/NUqhw+npjLDhlMZ/PhSHZN4s9NdmuumcxKHQqbHlGVqc8ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Template Main JS File -->
        <script src="{{asset('assets/js/main.js')}}"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $('#add').hide();
                $('#user_form').hide();
                $('#user_dialog').hide();
                $('#model_form').on('submit', function(event){
                    event.preventDefault();
                    console.log($(this).serialize());
                    var form_data = $(this).serialize();
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                        }
                    });

                    $.ajax({
                        url:"addVentes",
                        method:"POST",
                        data:form_data,
                        success:function(data)
                        {
                            console.log(data);
                            $('#user_data').find("tr:gt(0)").remove();
                            // $('#action_alert').html('<p>Vente crée avec succès.Complètez les produits de la vente pour finaliser.</p>');
                            // $('#action_alert').dialog('open');
                            $('#model_id').val(data);
                            $('#model_form').hide();
                            $('#user_form').show();
                            $('#add').show();
                        }
                    })
                });
            });
        </script>

        <script type="text/javascript">
            $(document).ready(function(){
                var count = 0;

                $('#user_dialog').dialog({
                    autoOpen:false,
                    width:400
                });

                $('#add').click(function(){
                    $('#user_dialog').dialog('option', 'title', 'Ajouter un produit');
                    $('#commande').val('');
                    $('#prix').val('');

                    $('#commande').css('border-color', '');
                    $('#prix').css('border-color', '');

                    $('#save').text('Ajouter');
                    $('#user_dialog').dialog('open');
                });

                $('#save').click(function(){
                    //critère =
                    commande = $('#commande').val();
                    prix = $('#prix').val();

                    if($('#save').text() == 'Ajouter')
                    {
                        count = count + 1;
                        output = '<tr id="row_'+count+'">';
                        output += '<td>'+commande+' <input type="hidden" name="hidden_commande[]" id="commande'+count+'" class="commande" value="'+commande+'" /></td>';
                        output += '<td>'+prix+' <input type="hidden" name="hidden_prix[]" id="prix'+count+'" value="'+prix+'" /></td>';
                        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+count+'">Voir</button></td>';
                        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+count+'">Supprimer</button></td>';
                        output += '</tr>';
                        $('#user_data').append(output);
                    }
                    else
                    {
                        var row_id = $('#hidden_row_id').val();
                        output = '<td>'+commande+' <input type="hidden" name="hidden_commande[]" id="commande'+row_id+'" class="commande" value="'+commande+'" /></td>';
                        output += '<td>'+prix+' <input type="hidden" name="hidden_prix[]" id="prix'+row_id+'" value="'+prix+'" /></td>';
                        output += '<td><button type="button" name="view_details" class="btn btn-warning btn-xs view_details" id="'+row_id+'">Voir</button></td>';
                        output += '<td><button type="button" name="remove_details" class="btn btn-danger btn-xs remove_details" id="'+row_id+'">Supprimer</button></td>';
                        $('#row_'+row_id+'').html(output);
                    }
                    $('#user_dialog').dialog('close');
                });

                $(document).on('click', '.view_details', function(){
                    var row_id = $(this).attr("id");
                    var commande = $('#commande'+row_id+'').val();
                    var prix = $('#prix'+row_id+'').val();
                    $('#commande').val(commande);
                    $('#prix').val(prix);
                    $('#save').text('Modifier');
                    $('#hidden_row_id').val(row_id);
                    $('#user_dialog').dialog('option', 'title', 'Modifier une ligne de vente');
                    $('#user_dialog').dialog('open');
                });

                $(document).on('click', '.remove_details', function(){
                    var row_id = $(this).attr("id");
                    if(confirm("Êtes-vous sûre de vouloir supprimer cet enregistrement ?"))
                    {
                        $('#row_'+row_id+'').remove();
                    }
                    else
                    {
                        return false;
                    }
                });

                $('#action_alert').dialog({
                    autoOpen:false
                });

                $('#user_form').on('submit', function(event){
                    event.preventDefault();
                    var model_id = $('#model_id').val();
                    console.log(model_id);
                    console.log($(this).serialize());
                    var count_data = 0;
                    $('.commande').each(function(){
                        count_data = count_data + 1;
                    });

                    if(count_data > 0)
                    {
                        var form_data = $(this).serialize();
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                            }
                        });

                        $.ajax({
                            url:"addVentesLignes/"+model_id,
                            method:"POST",
                            data:form_data,
                            success:function(data)
                            {
                                $('#user_data').find("tr:gt(0)").remove();
                                $('#action_alert').html('<p>Vente effectué avec succès.</p>');
                                $('#action_alert').dialog('open');
                                window.location.replace("http://127.0.0.1:8000/showVentesDays");
                            }
                        })
                    }
                    else
                    {
                        $('#action_alert').html('<p>Ajoutez au moins un produit</p>');
                        $('#action_alert').dialog('open');
                    }
                });
            });
        </script>

        <script type="text/javascript">
            function details(variableRecuperee){
                $('.erase').remove();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': '<?php echo csrf_token(); ?>'
                }
                });
                $.ajax({
                    method:'GET',
                    url: 'http://127.0.0.1:8000/ventes/details/'+parseInt(variableRecuperee),
                    dataType: 'json',
                    success: function(data){
                    //console.log(data);

                    var count = 0;
                    // var output = '<span id="erase">';
                    // output += '</span>';
                    // $('#user_data1').append(output);
                    for(var i= 0; i < data.length; i++) {
                        valeurs = data[i];
                        count = count + 1;
                        output = '<tr class="erase" id="row_'+count+'">';
                        output += '<td>'+count+'</td>';
                        output += '<td>'+valeurs.produit+'</td>';
                        output += '<td>'+valeurs.prix+' FCFA</td>';
                        output += '</tr>';
                        $('#user_data1').append(output);
                    }

                    $('#exampleModalScrollable').modal('show');
                }
                });
            }
        </script>

    </body>
</html>
