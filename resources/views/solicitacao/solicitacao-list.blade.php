@extends('layouts.application')

@section('content')
    <h1 class="ls-title-intro ls-ico-code">Lista de Exames</h1>

    @if (isset($msg))
        <div class="alert alert-success">
            {{ $msg }}
        </div>
    @endif

    @if ($reports == false)
        <div class="alert alert-danger" role="alert">
            Não há solicitações para exibir!
        </div>
    @else
        <table class="table table-hover" id="tabDocuments">
            <thead>
                <tr>
                    <th width="30">Cód</th>
                    <th>NOME</th>
                    <th>EXAME</th>
                    <th>MEDICO LAUDADOR</th>
                    <th>Data do Exame</th>
                    <th width="240">Ações</th>
                </tr>
            </thead>
            <tbody id="tbodyrequests">
                <tr>
                    <td></td>
                </tr>
            </tbody>
        </table>
    @endif

    <script type="text/javascript">
        // Salva os dados da tabela, na var requests
        var requests = <?php echo $reports; ?>;
        var userRoleId = <?php echo $role_id; ?>;
        // alert(userRoleId);


        // Se o dia ou mês for menor que 10 será formatdo com um "0" a esquerda
        function checkTime(i) {
            return (i < 10 ? `0${i}` : i);
        }



        function nomePaciente(parteDoNome) {
            // Suponha que requests[i].name contenha o nome completo
            var nomeCompleto = requests[i].name; // Substitua "name" pelo nome da sua variável

            // Defina o número de caracteres que você deseja exibir
            var numeroDeCaracteresDesejado = 15; // Substitua pelo número desejado

            // Obtenha a parte desejada do nome
            var parteDoNome = nomeCompleto.substring(0, numeroDeCaracteresDesejado);

            // Agora você pode usar parteDoNome no seu HTML
            if (parteDoNome > numeroDeCaracteresDesejado) {
                return parteDoNome + "...";
            } else {
                return parteDoNome;
            }
            // var td = "<td>" + parteDoNome + "</td>";
        }


        // Reseta a Table de solicitações
        tbodyrequests.innerHTML = '';
        // O "for" percorre o array de solicitações com base em seu tamanho
        for (var i = 0; i < requests.length; i++) {


            var datetime = new Date(requests[i].data_do_exame);

            // Considerar o timezone do usuário
            var offset = datetime.getTimezoneOffset();
            datetime.setMinutes(datetime.getMinutes() + offset);

            var day = checkTime(datetime.getDate());
            var month = checkTime(datetime.getMonth() + 1);
            var year = datetime.getFullYear();

            var hour = checkTime(datetime.getHours());
            var minutes = checkTime(datetime.getMinutes());
            var seconds = checkTime(datetime.getSeconds());

            function actionEditAndDeleteAnd(sts) {
                if (userRoleId == 1) {
                    console.log(`IF ${userRoleId}`)
                    sts = `<div class="col-md-4">
                <a class="ls-ico-pencil ls-btn-dark" style="background-color: blue;" href="/solicitacao-edit/${requests[i].id}"></a>
              </div>
              <div class="col-md-4">
                <a class="ls-ico-remove ls-btn-primary-danger" onclick="return confirm('Deseja realmente excluir essa solicitação?')" href="/solicitacao/delete/${requests[i].id}"></a>
              </div>
              <div class="col-md-4">
                <a class="ls-ico-windows ls-btn" href="/request-report-pdf/${requests[i].id}" target="_blank"></a>
              </div>`;
                    return sts;
                } else if (userRoleId == 2) {
                    console.log(`ELSE IF ${userRoleId}`)
                    sts = `<div class="col-md-4">
                <a class="ls-ico-pencil ls-btn-dark" style="background-color: blue;" href="/solicitacao-edit/${requests[i].id}"></a>
              </div>
              <div class="col-md-4">
                <a class="ls-ico-windows ls-btn" href="/request-report-pdf/${requests[i].id}" target="_blank"></a>
              </div>`;
                    return sts;
                } else {
                    console.log(`ELSE ${userRoleId}`)
                    sts = `<div class="col-md-4">
                <a class="ls-ico-windows ls-btn" href="/request-report-pdf/${requests[i].id}" target="_blank"></a>
              </div>`;
                    return sts;
                }
            }

            // Preenche a tabela esquerda com as solicitações
            tbodyrequests.innerHTML += `<tr onclick="showScript('` + requests[i].grouprequest + `')">` +
                "<tr>" +
                "<td>" + requests[i].id + "</td>" +
                "<td>" + nomePaciente(requests[i].name) + "</td>" +
                // "<td>" + requests[i].name + "</td>" +
                "<td>" + requests[i].geral_theme + "</td>" +
                "<td>" + requests[i].medico + "</td>" +
                "<td>" +
                day + "/" + month + "/" + datetime.getFullYear() + "<br/>" +
                (
                    parseInt(requests[i].created_at.substring(11, 13)) - 3 < 0 ?
                    "0" + (parseInt(requests[i].created_at.substring(11, 13)) - 3 + 24) :
                    (parseInt(requests[i].created_at.substring(11, 13)) - 3)
                ).toString().padStart(2, '0') +
                requests[i].created_at.substring(13, 19) +
                "</td>" +
                `<td>
            <div class="col-12">` +
                actionEditAndDeleteAnd(requests[i]); +
            `</div>
        </td>` +
            "</tr>";
        }
    </script>
    <!-- Exibe as opções de Datatables nas tabelas -->

    <script type="text/javascript">
        $(document).ready(function() {
                    $('#tabDocuments').DataTable({
                            "serverSide": true,
                            "processing": true,
                            header('Content-Type:
                                application /
                                json ');
                                echo json_encode($dados);
                                "cache":
                                true,
                                dom:
                                'Bfrtip',
                                buttons: [
                                    'copyHtml5',
                                    'excelHtml5',
                                    'csvHtml5',
                                    'pdfHtml5'
                                ],
                                //
                                ajax: {
                                    //
                                    url: "../php/join.php",
                                    //
                                    type: 'GET'
                                    //
                                }
                            });
                    });
    </script>
@endsection
