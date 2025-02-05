<div>
    <!-- formulario -->
    <form class="row bg-indigo-300 rounded pt-1 pb-3 mb-3">
        <!--h6 class="h6"><strong><i class="bi bi-search"></i> Filtros</strong></h6-->
        <div class="col-md-2">
            <label class="text-dark"><strong>ID</strong></label>
            <input type="text" placeholder="id da venda" wire:model.live="id_venda" id="id_venda"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-3">
            <label class="text-dark"><strong>Cliente</strong></label>
            <input type="text" placeholder="cliente" wire:model.live="nome_cliente" id="nome_cliente"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Data inicial</strong></label>
            <input type="date" wire:model.live="horario_inicial_venda" id="horario_inicial_venda"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Data final</strong></label>
            <input type="date" wire:model.live="horario_final_venda" id="horario_final_venda"
                    class="form-control border rounded py-1 px-2 shadow-sm">
        </div>
        <div class="col-md-2">
            <label class="text-dark"><strong>Status de pagamento</strong></label>
            <select class="form-select border rounded py-1 px-3 shadow-sm" wire:model.live="status_venda" id="status_venda">
                <option value="">Todos</option>
                <option value="pago">Pago</option>
                <option value="devedor">devedor</option>
            </select>
        </div>
        <div class="col-md">
            <button type="button" class="btn btn-sm btn-secondary px-auto mt-4" onclick="location.reload();">
                <i class="bi bi-arrow-clockwise"></i> Limpar
            </button>
        </div>
    </form>
</div>