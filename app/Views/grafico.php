<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Charts</title>
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>
    
        //Carregar a API de visualização e o pacote do gráfico
        google.charts.load('current', {
            'packages' : [
                'corechart',
                'table'
            ]
        });

        //Definimos  qual função o google charts irá chamar quando tudo for carregado
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() 
        {
            var jsonData = $.ajax(
                {
                    url : 'home/getDados',
                    dataType: 'json',
                    async: false
                }
            ).responseText

            //Cria o data table com os dados vindos do JSON do servidor
            var data = new google.visualization.DataTable(jsonData);

            var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));

            chart.draw(
                data,
                {
                    width: '100%',
                    height: 600
                }
            );

            //Criando o data view
            var view = new google.visualization.DataView(data);

            var table = new google.visualization.Table(document.getElementById('data_view'));
            table.draw(view);

        }

    </script>

</head>
<body>
    <h1>Gráfico do google</h1>
    <div id="chart_div"></div>
    <div id="data_view"></div>
</body>
</html>