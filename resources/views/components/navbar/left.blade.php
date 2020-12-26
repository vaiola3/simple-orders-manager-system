<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="sidebar-sticky pt-3">
        <ul class="nav flex-column">
            <!-- <li class="nav-item">
            <a class="nav-link active" href="#">
            <span data-feather="home"></span>
            Principal <span class="sr-only">(current)</span>
            </a>
            </li> -->
            <li class="nav-item d-flex justify-content-between">
                <a 
                    class="nav-link container-fluid @if ($current_view == 'clients') active @endif" 
                    href="{{ route('clients.index') }}">
                    <div class="">
                        <span data-feather="users"></span>
                        Clientes
                    </div>
                </a>
                <a class="nav-link" href="{{ route('clients.create') }}">
                    <span 
                        class="align-middle"
                        data-feather="plus-circle" 
                        align="right" 
                        data-toggle="tooltip" 
                        data-placement="top" 
                        title="Adicionar cliente">
                    </span>
                </a>
            </li>
            <li class="nav-item d-flex justify-content-between">
                <a 
                    class="nav-link @if (in_array($current_view, ['order.index', 'order.create'])) active @endif" 
                    href="{{ route('orders.index') }}">
                    <div class="">
                        <span data-feather="package"></span>
                        Pedidos
                    </div>
                </a>
                <a 
                    class="nav-link @if ($current_view == 'order.create') active @endif" 
                    href="{{ route('orders.create') }}">
                    <span
                        class="align-middle"
                        data-feather="plus-circle"
                        align="right"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Adicionar pedido">
                    </span>
                </a>
            </li>

            <li class="nav-item d-flex justify-content-between">
                <a class="nav-link @if ($current_view == 'dishes') active @endif" href="#">
                    <div class="">
                        <span data-feather="layers"></span>
                        Pratos
                    </div>
                </a>
                <a class="nav-link" href="#">
                    <span
                        class="align-middle"
                        data-feather="plus-circle"
                        align="right"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Adicionar prato">
                    </span>
                </a>
            </li>

            <li class="nav-item d-flex justify-content-between">
                <a class="nav-link @if ($current_view == 'deliverys') active @endif" href="#">
                    <div class="">
                        <span data-feather="truck"></span>
                        Entregas
                    </div>
                </a>
                <a class="nav-link" href="#">
                    <span
                        class="align-middle"
                        data-feather="plus-circle"
                        align="right"
                        data-toggle="tooltip"
                        data-placement="top"
                        title="Adicionar entrega realizada">
                    </span>
                </a>
            </li>

            <li class="nav-item d-flex justify-content-between">
                <a class="nav-link @if ($current_view == 'settings') active @endif" href="#">
                    <div class="">
                        <span data-feather="settings"></span>
                        Configurações
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>