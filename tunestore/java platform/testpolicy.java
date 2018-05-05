import java.io.FileReader;
import java.io.FileWriter;
import java.io.BufferedReader;
import java.io.IOException;
import java.io.PrintWriter;
import java.util.logging.Level;
import java.util.logging.Logger;

public class testpolicy {
	private static final Logger logger = Logger.getLogger("org.sans.example");
	
    public static void main(String [] args) {
    	FileReader fr  = null;
    	BufferedReader br = null;
    	FileWriter fw = null;
    	PrintWriter pw = null;
    	
        try {
           fr = new FileReader("./infile.txt");
           br = new BufferedReader(fr);
            
          fw = new FileWriter("./outfile.txt");
          pw = new PrintWriter(fw);
            
          String data = br.readLine();
          while ( data != null ) {
              pw.println(data);
              data = br.readLine();
          }
            
            System.out.println("Done writing output file.");
            
       }
        catch (IOException e) {
            logger.log(Level.WARNING, "Could not read/write file", e);
        } 
        finally {
        	if (pw != null)
        		pw.close();
        	
        	try {
        		if (fw != null)
        			fw.close();
        	} catch (IOException io) {
        		logger.log(Level.WARNING, "Could not close resource", io);
        	}
        	
        	try {
        		if (br != null)
        			br.close();
        	} catch (IOException io1) {
        		logger.log(Level.WARNING, "Could not close resource", io1);
        	}
        	
        	try {
        		if (fr != null)
        			fr.close();
        	} catch (IOException io2) {
        		logger.log(Level.WARNING, "Could not close resource", io2);
        	}
        }

    }
} 
