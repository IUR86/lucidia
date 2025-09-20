<x-counterparty.common>
    <div class="content">
        <div class="container-fluid">
            <x-counterparty.message.info />
            <div class="row">
                <div class="col-md-8 col-md-8-max-width">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">契約情報</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('counterparty.profile.update', ['subdomain' => request()->route('subdomain')]) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-5 pr-1">
                                        <div class="form-group">
                                            <label>名前</label>
                                            <input type="text" class="form-control" disabled="" placeholder="Company" value="{{ $counterparty->name }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pl-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">メールアドレス</label>
                                            <input name="email" type="email" class="form-control" value="{{ $counterparty->email }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>サブドメイン</label>
                                            <input name="subdomain" type="text" class="form-control" value="{{ $counterparty->subdomain }}">
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">更新する</button>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-counterparty.common>