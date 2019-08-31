SELECT
	jamaah.nama
	, infaq.nama
	, IF(0 = dibulatkan, '', dibulatkan)
FROM struk
LEFT JOIN jamaah ON struk.jamaah = jamaah.`uuid`
LEFT JOIN strukdetail ON struk.`uuid` = strukdetail.struk
LEFT JOIN jatahdesadetail ON strukdetail.jatahDesaDetail = jatahdesadetail.`uuid`
LEFT JOIN infaq ON jatahdesadetail.infaq = infaq.`uuid`
LEFT JOIN jatahdesa ON jatahdesa.`uuid` = jatahdesadetail.jatahDesa
WHERE TRUE
AND MONTH(jatahdesa.tanggal) = 9 AND YEAR(jatahdesa.tanggal) = 2019
ORDER BY struk.jamaah, dibulatkan, infaq.nama