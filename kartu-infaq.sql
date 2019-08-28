SELECT
	jamaah.nama
	, infaq.nama
	, IF(0 = dibulatkan, '', dibulatkan)
FROM struk
LEFT JOIN jamaah ON struk.jamaah = jamaah.`uuid`
LEFT JOIN strukdetail ON struk.`uuid` = strukdetail.struk
LEFT JOIN jatahdesadetail ON strukdetail.jatahDesaDetail = jatahdesadetail.`uuid`
LEFT JOIN infaq ON jatahdesadetail.infaq = infaq.`uuid`
WHERE TRUE
ORDER BY struk.jamaah, dibulatkan, infaq.nama