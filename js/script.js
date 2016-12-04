jQuery("document").ready(function($){
var nav = $('.nav');
$(window).scroll(function () {
if ($(this).scrollTop() > 168) {
nav.addClass("menu-fixo row container");
} else {
nav.removeClass("menu-fixo row container");
}
});
});



var app= angular.module('formfunc', []);
app.controller('funccontroller', function($scope,$http){
	$scope.cadastrar=function(){
		$http.post("insert.php", {'nome':$scope.nome,'mat':$scope.mat,'email':$scope.email,'senha':$scope.senha})
		.sucess(function(data,status,headers,config){
			console.log("Registrado com sucesso!");

		});
	}
	
});


var app = angular.module('myApp', []);
app.controller('inicioCtrl', function($scope) {
    $scope.iniciar = "A pagina inicio mostra os registros de eventos que já aconteceram.",
    $scope.insere = "A pagina inserir registro permite ao usuario criar um novo evento determinando data, hora, local, quantidade de publico e até colocar imagens anexadas, Obrigatoriamente preencha os campos de tipo de atividade e classificação, local onde será a atividade,faixa etaria e tipo de publico, nos campos de data selecione mes e ano e escolha o dia pelo calendario que surge na tela, Caso queira selecionar uma imagem , clique em Escolher arquivos, depois basta salvar registro.",
    $scope.relatorio = "A pagina relatorio permite que voce tire relatorios como por exemplo, quantos eventos aconteceram este ano, Caso queira apenas deste ano, basta clicar em Gerar relatorio logo acima do grafico como mostra na primeira imagem, caso queira um relatorio personalizado com outro ano, basta selecionar mais abaixo o ano e clicar enviar para atualizar a pagina, depois clique em gerar relatorio personalizado.",
    $scope.download = "A pagina de Download basta digitar o numero do evento, que pode ser encontrado na pagina inicial como mostra na imagem abaixo. "
    $scope.myVar = false;
    $scope.myVar2 = false;
    $scope.myVar3 = false;
    $scope.myVar4 = false;
    $scope.toggle1 = function() {
        $scope.myVar = !$scope.myVar;
    };
    $scope.toggle2 = function() {
        $scope.myVar2 = !$scope.myVar2;
    };
    $scope.toggle3 = function() {
        $scope.myVar3 = !$scope.myVar3;
    };
    $scope.toggle4 = function() {
        $scope.myVar4 = !$scope.myVar4;
    };
});
