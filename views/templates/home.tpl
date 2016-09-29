{extends file="layouts/layout.tpl"}

{block name="content"}

<div class="arriv">
	<div class="container">
		{if $DSChuDe}
			<div class="arriv-top">
				<a href="{$path}/chu-de-{$DSChuDe[0]['ten_chu_de_url']}-{$DSChuDe[0]['ma_chu_de']}.html">
					<div class="col-md-6 arriv-left">
						<img src="{$path}/public/images/{$DSChuDe[0]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3>{$DSChuDe[0]['ten_chu_de']}</h3>
							<p>{$DSChuDe[0]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<a href="{$path}/chu-de-{$DSChuDe[1]['ten_chu_de_url']}-{$DSChuDe[1]['ma_chu_de']}.html">
					<div class="col-md-6 arriv-right">
						<img src="{$path}/public/images/{$DSChuDe[1]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info">
							<h3>{$DSChuDe[1]['ten_chu_de']}</h3>
							<p>{$DSChuDe[1]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-bottm">
				<a href="{$path}/chu-de-{$DSChuDe[2]['ten_chu_de_url']}-{$DSChuDe[2]['ma_chu_de']}.html">
					<div class="col-md-8 arriv-left1">
						<img src="{$path}/public/images/{$DSChuDe[2]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info2">
							<h3>{$DSChuDe[2]['ten_chu_de']}</h3>
							<p>{$DSChuDe[2]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<a href="{$path}/chu-de-{$DSChuDe[3]['ten_chu_de_url']}-{$DSChuDe[3]['ma_chu_de']}.html">
					<div class="col-md-4 arriv-right1">
						<img src="{$path}/public/images/{$DSChuDe[3]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3>{$DSChuDe[3]['ten_chu_de']}</h3>
							<p>{$DSChuDe[3]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-bottm">
				<a href="{$path}/chu-de-{$DSChuDe[4]['ten_chu_de_url']}-{$DSChuDe[4]['ma_chu_de']}.html">
					<div class="col-md-4 arriv-left2">
						<img src="{$path}/public/images/{$DSChuDe[4]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3>{$DSChuDe[4]['ten_chu_de']}</h3>
							<p>{$DSChuDe[4]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<a href="{$path}/chu-de-{$DSChuDe[5]['ten_chu_de_url']}-{$DSChuDe[5]['ma_chu_de']}.html">
					<div class="col-md-8 arriv-right3">
						<img src="{$path}/public/images/{$DSChuDe[5]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info2">
							<h3>{$DSChuDe[5]['ten_chu_de']}</h3>
							<p>{$DSChuDe[5]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<div class="clearfix"> </div>
			</div>
			<div class="arriv-las">
				<a href="{$path}/chu-de-{$DSChuDe[6]['ten_chu_de_url']}-{$DSChuDe[6]['ma_chu_de']}.html">
					<div class="col-md-4 arriv-left2">
						<img src="{$path}/public/images/{$DSChuDe[6]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3>{$DSChuDe[6]['ten_chu_de']}</h3>
							<p>{$DSChuDe[6]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<a href="{$path}/chu-de-{$DSChuDe[7]['ten_chu_de_url']}-{$DSChuDe[7]['ma_chu_de']}.html">
					<div class="col-md-4 arriv-middle">
						<img src="{$path}/public/images/{$DSChuDe[7]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3>{$DSChuDe[7]['ten_chu_de']}</h3>
							<p>{$DSChuDe[7]['mo_ta']}</p>
						</div>
					</div>
				</a>
				<a href="{$path}/chu-de-{$DSChuDe[8]['ten_chu_de_url']}-{$DSChuDe[8]['ma_chu_de']}.html">
					<div class="col-md-4 arriv-right2">
						<img src="{$path}/public/images/{$DSChuDe[8]['hinh']}" class="img-responsive" alt="">
						<div class="arriv-info1">
							<h3>{$DSChuDe[8]['ten_chu_de']}</h3>
							<p>{$DSChuDe[8]['mo_ta']}
						</div>
					</div>
				</p>
				<div class="clearfix"> </div>
			</div>
		{/if}
	</div>
</div>

{/block}