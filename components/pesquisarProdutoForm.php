<h1>Pesquisar Remédio</h1>
<div class="container">

<!-- ========================================================= -->
<!--               FORMULÁRIO DE PESQUISA DE PRODUTO           -->
<!-- ========================================================= -->

    <form id="pesquisarProdutoForm" class="search-form">
        <div class="input-group">
            <label>Nome do Remédio</label>
            <input id="nome_pesquisa" name="nome" type="text" required>
        </div>
        <p>
            <button type="button" id="pesquisar_produto_btn" class="btn">
                Pesquisar
            </button>
        </p>
    </form>

<!-- ========================================================= -->
<!--                          TABELA                           -->
<!-- ========================================================= -->

    <table class="product-table" id="tabela-produtos" style="margin-top:20px;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Vencimento</th>
                <th>Lote</th>
                <th>Qtd.</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            </tbody>
    </table>

<!-- ========================================================= -->
<!--                MODAL DE EDIÇÃO DE PRODUTO                 -->
<!-- ========================================================= -->

<div id="id01" class="modal">
        <div class="modal-content">

            <button class="modal-close" onclick="document.getElementById('id01').style.display='none'">&times;</button>

            <h2>Editar Produto</h2>

            <form id="editarProdutoForm" class="modal-form">

                <input type="hidden" id="id_produto_edicao">

                <div class="input-group">
                    <label>Quantidade</label>
                    <input id="quantidade" type="text" required>
                </div>

                <button type="button" id="editar_produto_btn" class="btn-atualizar">
                    Atualizar
                </button>

            </form>
        </div>
    </div>
</div>
<script type="module">
    import {
        ProdutoCrud
    } from "./js/ProdutoCrud.js";

    const produtoCrud = new ProdutoCrud({

        entityName: "produto",
        rowIdPrefix: "tr",

        selectors: {
            // PESQUISA
            searchInput: "#nome_pesquisa",
            searchButton: "#pesquisar_produto_btn",
            tableBody: "#tabela-produtos tbody",

            // MODAL
            modalId: "id01",
            saveButton: "#editar_produto_btn",
            hiddenId: "#id_produto_edicao",

            // CAMPOS DE EDIÇÃO
            formFields: {
                quantidade: "#quantidade",
            },
        },

        urls: {
            search: "backend/pesquisarProduto.php",
            update: "backend/editarProduto.php",
            delete: "backend/deletarProduto.php",
        }
    });

    produtoCrud.init();
</script>

<!-- <script>
document.addEventListener("click", function (event) {
    if (event.target && event.target.id === "pesquisar_produto_btn") {
        
        const nomeValue = document.getElementById("nome_pesquisa").value;

        
        fetch("backend/pesquisarProduto.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/x-www-form-urlencoded"
            },
            body: "nome=" + encodeURIComponent(nomeValue)
        })
        .then(response => response.json())
        .then(produtos => {
            const tabela = document.querySelector("#tabela-produtos tbody");
            tabela.innerHTML = ""; // Limpa a tabela antes de preencher

            if (produtos.length === 0) {
                tabela.innerHTML = "<tr><td colspan='5'>Nenhum remédio encontrado.</td></tr>";
                return;
            }

            produtos.forEach(p => {
                
                tabela.innerHTML += `
                    <tr>
                        <td>${p.id}</td>
                        <td>${p.nome}</td>
                        <td>${p.data_vencimento}</td>
                        <td>${p.lote}</td>
                        <td>${p.quantidade}</td>
                    </tr>
                `;
            });
        })
        .catch(error => {
            console.error("Erro ao pesquisar:", error);
            alert("Erro ao conectar com o servidor.");
        });
    }
});
</script>