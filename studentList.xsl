<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
	<html>
	<body>
	<h2>Αναφορα Φοιτητων</h2>
	<p>Αριθμος φοιτητων :<xsl:value-of select="count(studentList/student)"/> </p>
	<p>Μέσος Όρος :<xsl:value-of select="sum(studentList/student/avg) div count(studentList/student)"/> </p>
  
  
  <table border="1">
    <tr bgcolor="#9acd32">
      <th style="text-align:left">Ονομα</th>
      <th style="text-align:left">Επώνυμο</th>
	  <th style="text-align:left">Μαθήματα</th>
	  <th style="text-align:left">Μέσος όρος</th>
	  <th style="text-align:left">Εξάμηνο</th>
    </tr>
    <xsl:for-each select="studentList/student">
    <tr>
      <td><xsl:value-of select="name" /></td>
      <td><xsl:value-of select="lastname" /></td>
	  <td><xsl:value-of select="lessons" /></td>
	  <td><xsl:value-of select="avg" /></td>
	  <td><xsl:value-of select="semester" /></td>
	 
    </tr>
    </xsl:for-each>
	
	
  </table>
   <h2>Αναφορα Φοιτητων Με το Μεγαλύτερο Μέσο Όρο</h2>
  <table border="1">
  <tr bgcolor="red">
      <th style="text-align:left">Ονομα</th>
      <th style="text-align:left">Επώνυμο</th>
	  <th style="text-align:left">Μαθήματα</th>
	  <th style="text-align:left">Μέσος όρος</th>
    </tr>
	<xsl:for-each select="studentList/highaverage">
	<tr>
      <td><xsl:value-of select="Sname" /></td>
      <td><xsl:value-of select="Slastname" /></td>
	  <td><xsl:value-of select="Slessons" /></td>
	  <td><xsl:value-of select="Savg" /></td>
    </tr>
	  </xsl:for-each>
  </table>
 
    </body>
  </html>
</xsl:template>

</xsl:stylesheet>