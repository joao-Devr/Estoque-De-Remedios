// ProdutoCrud.js
import { CrudUI } from "./crudUI.js";

export class ProdutoCrud extends CrudUI {

    buildSearchBody(term) {
        return "nome=" + encodeURIComponent(term);
    }

    buildDeleteBody(id) {
        return "id=" + encodeURIComponent(id);
    }

    // Dados para EDITAR
    getFormData() {
        return {
            id: document.querySelector(this.s.hiddenId).value,
            quantidade: document.querySelector(this.s.formFields.quantidade).value
        };
    }

    buildUpdateBody(d) {
        return (
            "id=" + encodeURIComponent(d.id) +
            "&quantidade=" + encodeURIComponent(d.quantidade)
        );
    }

    // Dados para CADASTRAR
    getCreateData() {
        const f = this.s.createFields;
        return {
            nome: document.querySelector(f.nome).value,
            data_vencimento: document.querySelector(f.data_vencimento).value,
            lote: document.querySelector(f.lote).value,
            quantidade: document.querySelector(f.quantidade).value
        };
    }

    buildCreateBody(d) {
        return (
            "nome=" + encodeURIComponent(d.nome) +
            "&data_vencimento=" + encodeURIComponent(d.data_vencimento) +
            "&lote=" + encodeURIComponent(d.lote) +
            "&quantidade=" + encodeURIComponent(d.quantidade)
        );
    }

    fillFormFromRow(row) {
        const tds = row.getElementsByTagName("td");
        document.querySelector(this.s.hiddenId).value = tds[0].textContent;
        document.querySelector(this.s.formFields.quantidade).value = tds[4].textContent;
    }

    renderRows(remedios) {
        return remedios.map(p => `
            <tr id="tr${p.id}">
                <td>${p.id}</td>
                <td>${p.nome}</td>
                <td>${p.data_vencimento}</td>
                <td>${p.lote}</td>
                <td>${p.quantidade}</td>
                <td>
                    <button type="button" class="btn-editar" data-id="${p.id}">Editar</button> |
                    <button type="button" class="btn-deletar" data-id="${p.id}">Deletar</button>
                </td>
            </tr>
        `).join("");
    }
}