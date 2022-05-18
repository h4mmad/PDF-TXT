package com.Apache.PDFBox;

import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import org.apache.pdfbox.pdmodel.PDDocument;
import org.apache.pdfbox.text.PDFTextStripper;

public class PDFReader {
  public static void main(String[] args) throws Exception {
    String uploadPath = args[0];
    File pdfFile = new File(uploadPath);
    FileInputStream fis = new FileInputStream(pdfFile);
    PDDocument pdfDocument = PDDocument.load(fis);
    PDFTextStripper pdfTextStripper = new PDFTextStripper();
    String outText = pdfTextStripper.getText(pdfDocument);
    File textFile = new File(String.valueOf(args[0]) + ".txt");
    FileWriter writer = new FileWriter(textFile);
    writer.write(outText);
    writer.close();
    pdfDocument.close();
    fis.close();
    pdfFile.delete();
  }
}
