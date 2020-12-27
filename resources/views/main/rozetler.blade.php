@extends ('Layouts.mainLayout')

@section('content')
    <div class="breadcrumbs"><span class="crumbs" xmlns:v="https://rdf.data-vocabulary.org/#"><span typeof="v:Breadcrumb"> <a rel="v:url" property="v:title" href="../.."><i class="icon-home"></i>Anasayfa</a><span rel="v:child" typeof="v:Breadcrumb"><span class="crumbs-span"> / </span><span class="current">Rozetler</span></span>
                                </span>
                                </span>
        <div class="breadcrumb-right">
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="page-sections">
        <div class="page-section">
            <div class="page-wrap-content">
                <h2 class="post-title-3"><i class="icon-bucket"></i>Puan Sistemi</h2>
                <div class="post-content-text">
                    <p>KodCevap.com üzerinde gerçekleştirdiğiniz işlemler size puan kazandırır. Bu puanlar sitedeki
                    aktifliğinizi ve kodlamaya olan ilginizi yansıtan üye rozetleri kazanmanıza yardımcı olur.</p>
                    <p> Aşağıda puan kazanma sistemi anlatılmıştır.</p>
                </div>
                <div class="points-section">
                    <ul class="row">
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>20</span>Puan</div>
                                <p>Siteye referans olarak sizi belirterek kaydolan yeni bir üye.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>10</span>Puan</div>
                                <p>Herhangi bir soruya verdiğiniz cevabın soru sahibi tarafından çözüm olarak işaretlenmesi.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>2</span>Puan</div>
                                <p>Bir soru sormak.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>2</span>Puan</div>
                                <p>Bir soruya cevap yazmak.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>1</span>Puan</div>
                                <p>Sorduğunuz bir sorunun + veya - oy alması. (- Oy alırsanız 1 puan kaybedersiniz.)</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>1</span>Puan</div>
                                <p>Yazdığınız bir cevabın + veya - oy alması. (- Oy alırsanız 1 puan kaybedersiniz.)</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>50</span>Puan</div>
                                <p>100 soru sayısına ulaşmak.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>75</span>Puan</div>
                                <p>100 cevap sayısına ulaşmak.</p>
                            </div>
                        </li>
                        <li class="col col4">
                            <div class="point-section">
                                <div class="point-div"><i class="icon-bucket"></i><span>250</span>Puan</div>
                                <p>100 Çözüm sayısına ulaşmak.</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="page-section">
            <div class="page-wrap-content">
                <h2 class="post-title-3"><i class="icon-trophy"></i>Rozet Sistemi</h2>
                <div class="post-content-text">
                    <p>Besides gaining reputation with your questions and answers, you receive badges for being especially helpful. Badges appears on your profile page, questions &amp; answers.</p>
                </div>
                <div class="badges-section">
                    <ul>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #0d0e11;">Çaylak</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #0d0e11;"></i><span>0</span>Puan</div>
                                </div>
                                <p>Siteye üye olduğunuzda edindiğiniz rozettir.</p>
                            </div>
                        </li>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #de2b2b;">Yardımsever</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #de2b2b;"></i><span>50</span>Puan</div>
                                </div>
                                <p>Yavaş yavaş sitede aktif olmaya başladınız. Belki de birkaç tane soruya çözüm ürettiniz. Ve artık Yardımsever rozetine sahipsiniz. Böyle devam edin.</p>
                            </div>
                        </li>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #ffbf00;">Kod Bağımlısı</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #ffbf00;"></i><span>150</span>Puan</div>
                                </div>
                                <p>Yazdığınız sorular ve cevaplar beğeniliyor! Artık bir kod bağımlısı olarak anılacaksınız. Kullanıcılarımıza yardımlarınız için teşekkürler.</p>
                            </div>
                        </li>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #30a96f;">Uzman</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #30a96f;"></i><span>300</span>Puan</div>
                                </div>
                                <p> Sitede geçirdiğiniz zaman boyunca insanlara yardım ettiğiniz, soruları cevapsız bırakmmadığınız için kodcevap.com'da artık bir uzman olarak anılacaksınız.
                                    <a style="color: #30a96f;">Uzman rozetine sahip üyelerimiz profillerine kapak fotoğrafı ekleyebilir.</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #6b3de4;">Profesyonel</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #6b3de4;"></i><span>500</span>Puan</div>
                                </div>
                                <p> Üyelerin sorularına en çok çözüm üreten, KodCevap.com'da uzun zaman boyunca kendini yardımlaşmaya adayan üyelerimiz 300 puan'a ulaştıkları taktirde profesyonel rozetini kazanırlar.
                                <a style="color: #6b3de4;">Profesyonel üyelerimiz profillerine kapak fotoğrafına ek olarak web sitelerini ekleyebilirler.</a></p>
                            </div>
                        </li>
                        <li>
                            <div class="badge-section">
                                <div class="badge-div"><span class="badge-span" style="background-color: #861f1f;">Müdavim</span>
                                    <div class="point-div"><i class="icon-bucket" style="color: #861f1f;"></i><span>1000</span>Puan</div>
                                </div>
                                <p>KodCevap.com'un en popüler üyeleri arasında yer alan, en bilgili ve sosyal üyelerimiz 1000 puan'a ulaştığı taktirde Müdavim rozetine sahip olur.
                                <a style="color:#861f1f;"> Müdavim üyelerimiz tüm alt rozet ayrıcalıklarına ek olarak topluluk oluşturabilir, siteyi reklamsız gezebilirler.</a></p>
                                </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
