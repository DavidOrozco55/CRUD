<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
<html> 
<body>
  <h1>Discos (XML y XSL) </h1>
  <table border="1">
    <tr bgcolor="lightgray">
      <th style="text-align:left">No. del disco</th>
      <th style="text-align:left">Pelicula</th>
    </tr>
    <xsl:for-each select="discosBD/disco">
    <tr>
      <td><xsl:value-of select="id_disco"/></td>
      <td><xsl:value-of select="pelicula"/></td>
    </tr>
    </xsl:for-each>
  </table>
</body>
</html>
</xsl:template>
</xsl:stylesheet>
