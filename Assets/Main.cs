using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class Main : MonoBehaviour
{
    public static Main Instance;
    public Web Web;
    public userInfo userInfo;
    public itemOwn itemOwn;
    public GameObject UserProfile;
    public GameObject items;
    // Start is called before the first frame update
    void Start()
    {
        Instance = this;
        Web = GetComponent<Web>();
        userInfo = GetComponent<userInfo>();
        itemOwn = GetComponent<itemOwn>();
    }

   
}
